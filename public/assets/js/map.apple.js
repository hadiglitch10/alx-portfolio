$(function() {
	'use strict';

	// Define the style for the Apple-themed map
	var styleApple = [{
		'featureType': 'landscape.man_made',
		'elementType': 'geometry',
		'stylers': [{
			'color': '#f7f1df' // Light color for man-made landscapes
		}]
	}, {
		'featureType': 'landscape.natural',
		'elementType': 'geometry',
		'stylers': [{
			'color': '#d0e3b4' // Green color for natural landscapes
		}]
	}, {
		'featureType': 'landscape.natural.terrain',
		'elementType': 'geometry',
		'stylers': [{
			'visibility': 'off' // Hide natural terrain features
		}]
	}, {
		'featureType': 'poi',
		'elementType': 'labels',
		'stylers': [{
			'visibility': 'off' // Hide points of interest labels
		}]
	}, {
		'featureType': 'poi.business',
		'elementType': 'all',
		'stylers': [{
			'visibility': 'off' // Hide business points of interest
		}]
	}, {
		'featureType': 'poi.medical',
		'elementType': 'geometry',
		'stylers': [{
			'color': '#fbd3da' // Light color for medical points of interest
		}]
	}, {
		'featureType': 'poi.park',
		'elementType': 'geometry',
		'stylers': [{
			'color': '#bde6ab' // Light green color for parks
		}]
	}, {
		'featureType': 'road',
		'elementType': 'geometry.stroke',
		'stylers': [{
			'visibility': 'off' // Hide road stroke
		}]
	}, {
		'featureType': 'road',
		'elementType': 'labels',
		'stylers': [{
			'visibility': 'off' // Hide road labels
		}]
	}, {
		'featureType': 'road.highway',
		'elementType': 'geometry.fill',
		'stylers': [{
			'color': '#ffe15f' // Yellow color for highways
		}]
	}, {
		'featureType': 'road.highway',
		'elementType': 'geometry.stroke',
		'stylers': [{
			'color': '#efd151' // Darker yellow for highway stroke
		}]
	}, {
		'featureType': 'road.arterial',
		'elementType': 'geometry.fill',
		'stylers': [{
			'color': '#ffffff' // White color for arterial roads
		}]
	}, {
		'featureType': 'road.local',
		'elementType': 'geometry.fill',
		'stylers': [{
			'color': 'black' // Black color for local roads
		}]
	}, {
		'featureType': 'transit.station.airport',
		'elementType': 'geometry.fill',
		'stylers': [{
			'color': '#cfb2db' // Light purple color for airport transit stations
		}]
	}, {
		'featureType': 'water',
		'elementType': 'geometry',
		'stylers': [{
			'color': '#a2daf2' // Light blue color for water bodies
		}]
	}];

	// Initialize the map using GMaps
	var mapApple = new GMaps({
		el: '#mapApple', // HTML element where the map will be displayed
		zoom: 14, // Initial zoom level
		lat: 40.702247, // Latitude for map center
		lng: -73.996349 // Longitude for map center
	});

	// Map style is based on:
	// https://snazzymaps.com/style/4183/mostly-grayscale
	mapApple.addStyle({
		styledMapName: 'Shades Of Grey Map', // Name for the styled map
		styles: styleApple, // Apply the defined styles
		mapTypeId: 'map_apple' // Identifier for the styled map
	});

	// Set the map style to the defined Apple style
	mapApple.setStyle('map_apple');
});
