var Contact = function () {
	return {
		initMap: function () {
			var map;
			$(document).ready(function(){
				map = new GMaps({
				div: '#map',
				lat: 16.464414,
				lng: 107.589825
			});
			var marker = map.addMarker({
				lat: 16.464414,
				lng: 107.589825,
				title: 'Viettel Huế'
			});
			});
		}
	};
}();