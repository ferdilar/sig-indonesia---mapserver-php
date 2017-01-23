<center><h1>PETA ADMINISTRATIF INDONESIA DAN PENCARIAN</h1></center>
<div>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="lib/OpenLayers.js"></script>
    <script type="text/javascript">
        function init(){
			OpenLayers.ProxyHost="/proxy/?url=";
			var map = new OpenLayers.Map('map',
                        {maxExtent: new OpenLayers.Bounds(94.972335,-11.009721,141.011765,6.077241),
                         maxResolution: 0.075});
						 
			var mslayer = new OpenLayers.Layer.MapServer( "Batas Pulau",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",
						{layers: 'adm_pulau'},//sesuai nama di file map
						{isBaseLayer: true},//background
						{visibility: true}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
			
			var mslayer2 = new OpenLayers.Layer.MapServer( "Batas Provinsi",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",					
						{layers: 'adm_provinsi'},
						{isBaseLayer: true}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
			
			
			var mslayer3 = new OpenLayers.Layer.MapServer( "Batas Kota",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",
						{layers: 'adm_kota'},
						{isBaseLayer: true},
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
			
			var mslayer4 = new OpenLayers.Layer.MapServer( "Jalan",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",		
						{layers: 'roads'},
						{isBaseLayer: false},
						{visibility: false}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
						
			var mslayer5 = new OpenLayers.Layer.MapServer( "Jalur Kereta",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",		
						{layers: 'rails'},
						{isBaseLayer: false},
						{visibility: false}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
						
			var mslayer6 = new OpenLayers.Layer.MapServer( "Area Air",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",		
						{layers: 'water_areas'},
						{isBaseLayer: false},
						{visibility: false}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
						
			var mslayer7 = new OpenLayers.Layer.MapServer( "Jalur Air",
						"http://localhost:8000/cgi-bin/mapserv.exe?map=C:/ms4w/apps/gistask/state.map&",		
						{layers: 'water_lines'},
						{isBaseLayer: false},
						{visibility: false}, 
						{transparent: true},
						{format:'image/png'},
						{singleTile: "true", ratio:1} );
						
			map.addLayer(mslayer);
			// map.setBaseLayer(mslayer);
			map.addLayer(mslayer2); 
			// map.setBaseLayer(mslayer2);
			map.addLayer(mslayer3); 
			map.setBaseLayer(mslayer3);
			map.addLayer(mslayer4); 
			map.addLayer(mslayer5); 
			map.addLayer(mslayer6); 
			map.addLayer(mslayer7); 
			map.zoomTo(1);
			map.addControl(new OpenLayers.Control.LayerSwitcher() );
			map.addControl(new OpenLayers.Control.Scale());
			map.addControl(new OpenLayers.Control.Navigation());
			map.addControl(new OpenLayers.Control.MousePosition());
			map.addControl(new OpenLayers.Control.SelectFeature());
			map.addControl(new OpenLayers.Control.LayerSwitcher());
			
			var newl = new OpenLayers.Layer.Text( "Pencarian", {location:"http://localhost:8080/sig_indonesia/data.txt"} );
            map.addLayer(newl);
			
			//var markers = new OpenLayers.Layer.Markers( "Markers" );
            //map.addLayer(markers);

            var size = new OpenLayers.Size(21,25);
            var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
            var icon = new OpenLayers.Icon('img/marker.png',size,offset);
            var green = new OpenLayers.Icon('img/marker.png',size,offset);
            var blue = new OpenLayers.Icon('img/marker.png',size,offset);
            var gold = new OpenLayers.Icon('img/marker-gold.png',size,offset);
            
            //markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(107.8,-6.8),gold.clone()));
            //markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(107.9,-6.9),gold.clone()));

            //marker = new OpenLayers.Marker(new OpenLayers.LonLat(90,10),icon.clone());
            //marker.events.register('mousedown', marker, function(evt) { alert(this.icon.url); OpenLayers.Event.stop(evt); });
            //markers.addMarker(marker); 

        }
    </script>
	<div id="map" class="smallmap"></div>
  <script type="text/javascript">
	init();
  </script>
</div>

<hr/>
<center>
<table width="80%">
	<tr>
		<td>Cari Bersadarkan Lokasi</td>
		<td>
		<form action="controller.php" method="post">
			<input type="text" name="nama_lokasi" required>
			<input type="submit" value="cari">
		</form>
		</td>
	</tr>
	<tr>
		<td>Cari Berdasarkan Deskripsi</td>
		<td>
		<form action="controller.php" method="post">
			<input type="text" name="deskripsi" required>
			<input type="submit" value="cari">
		</form>
		</td>
	</tr>
</table>
</center>


