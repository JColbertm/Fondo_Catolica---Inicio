      	
      	function salario(){

      		document.getElementById("aporte-sp").disabled= true;
      		document.getElementById("ganado-sp").disabled= true;
      		document.getElementById("liquido-sp").disabled= true;
            var o = "a="+encodeURIComponent(2)+"&opcion="+ encodeURIComponent('buscar_ganancia');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                	var ganado_so=resp[0].total_ganado;
                    var pagable_so=resp[0].liquido_pagable;
                    var aporte_so=resp[0].monto_aporte;
                  console.log(ganado_so);
                  console.log(aporte_so);
                  $('#aporte-sp').val(aporte_so);
                  $('#ganado-sp').val(ganado_so);
                  $('#liquido-sp').val(pagable_so);
                  
            });
          
      	}
      	function datos_socio(){
      		document.getElementById("ci-sp"). disabled= true;
      		document.getElementById("nombres-sp").disabled= true;
      		document.getElementById("apellidos-sp").disabled= true;
      		document.getElementById("direccion-sp").disabled= true;
      		document.getElementById("celular-sp").disabled= true;
      		document.getElementById("depar-ucb-sp").disabled= true;
      		document.getElementById("interno-sp").disabled= true;
      		document.getElementById("correo-sp").disabled= true;
            var o = "a="+encodeURIComponent(2)+"&opcion="+ encodeURIComponent('buscar_datos_socio');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                  $('#ci-sp').val(resp[0].ci);
                  $('#nombres-sp').val(resp[0].nombre+" "+resp[0].nombre2);
                  $('#apellidos-sp').val(resp[0].apellido_p+" "+resp[0].apellido_m);
                  $('#celular-sp').val(resp[0].celular);
                  $('#depar-ucb-sp').val(resp[0].departamento);
                  $('#direccion-sp').val(resp[0].direccion);
                  $('#interno-sp').val(resp[0].interno);
                  $('#correo-sp').val(resp[0].correos);

            });
      	}
      	function mandar_form_prestamo(){

      	//var nom = $( 'formprestamo').serialize();
      	var formData = new FormData($("#formprestamo")[0]);
      		console.log(s);

      	}
