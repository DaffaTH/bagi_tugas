{
	let $link = document.querySelector('link[href*="main.css"]');
	if ($link) console.info('Version: '+($link.href||'').split('?v=')[1]);
}



const PREVMONTHSTART = moment().subtract(1, 'months').startOf('month');
const CURRMONTHSTART = moment().startOf('month');
const CURRMONTHEND = moment().endOf('month');
const PEGAWAIBYNIP = PEGAWAI? PEGAWAI.reduce((obj, { nipbps, ...rest }) => (obj[nipbps] = rest, obj), {}) : {};

const enumerateDays = (startDate, endDate) => {
	let dates = [],
		currDate = moment(startDate).startOf('day').subtract(1, 'days'),
		lastDate = moment(endDate).startOf('day');
	while (currDate.add(1, 'days').diff(lastDate)<=0) { dates.push(currDate.clone().toDate()) }
	return dates;
};



$(()=>{

	$('[data-toggle="tooltip"]').tooltip();

	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});

});



const renderChart = ({ id, categories=[], series=[], plotOptions={}, tooltip }) => {
	$('#'+id).css('height', 100*categories.length**.6-200);
	Highcharts.chart(id, {
		chart: { type: 'bar' },
		title: { text: '' },
		xAxis: { categories },
		yAxis: {
			min: 0,
			title: { text: 'Jumlah Hari Tugas' },
			labels: { style: { color: '#999' } },
			allowDecimals: false
		},
		plotOptions: {
			series: { stacking: 'normal', groupPadding: 0, ...plotOptions }
		},
		series,
		tooltip,
		legend: { enabled: false },
		credits: { enabled: false },
	});
}

var chartData;

if (PEGAWAI) {

	let data = [PEGAWAI.reduce((obj, { nipbps }) => (obj[nipbps] = [0], obj), {}), PEGAWAI.reduce((obj, { nipbps }) => (obj[nipbps] = [0,0,0], obj), {})];

	SURAT.forEach(({ pelaksana, tgl_mulai, tgl_akhir }) => {
		let days = enumerateDays(tgl_mulai, tgl_akhir);
		PEGAWAI.forEach(({ nipbps }) => {
			if (pelaksana.includes(nipbps)) {
				days.forEach(day => {
					if (moment(day).isBetween(PREVMONTHSTART, CURRMONTHSTART, 'day', '[)')) data[0][nipbps][0]++;
					if (moment(day).isBetween(CURRMONTHSTART, moment(), 'day', '[)')) { data[1][nipbps][0]++; data[1][nipbps][1]++; }
					if (moment(day).isBetween(moment(), CURRMONTHEND, 'day', '[]')) { data[1][nipbps][0]++; data[1][nipbps][2]++; }
				});
			}
		});
	});

	data = data.map( a => Object.keys(a).map(b => [PEGAWAIBYNIP[b].nama, ...a[b]]).sort((a,b) => b[1]-a[1]) );

	chartData = [{
		id: 'chart-bulan-lalu',
		categories: data[0].map(a => a[0]),
		series: [{
			name: 'Selesai',
			data: data[0].map(a => a[1])
		}],
		plotOptions: {
			color: '#31ce36',
			states: { hover: { color: '#45d249' } },
		},
		tooltip: {
			formatter: function() { return '<b>'+this.y+' hari</b>' }
		}
	},{
		id: 'chart-bulan-ini',
		categories: data[1].map(a => a[0]),
		series: [{
			name: 'Belum selesai',
			data: data[1].map(a => a[3]),
			color: '#48abf7',
			states: { hover: { color: '#59b3f7' } },
		},{
			name: 'Selesai',
			data: data[1].map(a => a[2]),
		}],
		plotOptions: {
			color: '#1572e8',
			states: { hover: { color: '#2b7fea' } },
		},
		tooltip: {
			shared: true,
			valueSuffix: ' hari'
		}
	}];

}



/*
------------------------------------------------------------------------
ROUTES
------------------------------------------------------------------------
*/

const urlParams = new URLSearchParams(window.location.search);
const urlBase = (document.getElementsByTagName('base')[0] || {}).href;
const urlPath = (path=null) => path===null? window.location.href.split('?')[0].split('#')[0].split(urlBase).join('') : path===window.location.href.split('?')[0].split(urlBase).join('');
const urlHost = window.location.host;

const $routes = $('[data-route]');

const route = (href, push=true) => {
	window.scrollTo(0,0);
	let $route = $(`[data-route="${href}"]`);
	if ($route.length===0) $route = $('[data-route="404"]');
	$routes.hide();
	$route.show();
	document.title = $route.data('title');
	let id = window.location.href.split('?')[0].split('#')[1];
	if (id && $('#'+id).length) $('html, body').animate({ scrollTop: $('#'+id).offset().top-62 }, 500);
	if (push) window.history.pushState(null, document.title, urlBase+href);
	if (PEGAWAI && href==='statistik' && SURAT.length) chartData.forEach(a => renderChart(a));
}

window.onpopstate = function(e) {
	route(urlPath(), false);
};

$(()=>{

	$(document)
	.on('click', '[data-custom-link][data-group="static-page"]', function(e) {
		e.preventDefault();
		let href = $(this).attr('href');
		if (!urlPath(href)) route(href);
	});

	route(urlPath(), false);

});
