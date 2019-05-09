<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(13.171091025086328,123.06335448437505),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TJ7uWp6hog-VzYEJgGcwC-hLG8mUXZk&callback=myMap"></script>