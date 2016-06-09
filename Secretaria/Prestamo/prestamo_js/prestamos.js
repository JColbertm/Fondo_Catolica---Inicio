      	
      	function salario(){

      		
                var n = $('#ci-rp').val();
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar_ganancia');//{a: n, opcion:'buscar'};
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
                	var ganado_so=resp.cantidad_sueldo;
                    var pagable_so=resp.liquido;
                    var aporte_so=resp.monto_aporte;
                  console.log(ganado_so);
                  console.log(aporte_so);
                  $('#aporte-rp').val(aporte_so);
                  $('#ganado-rp').val(ganado_so);
                  $('#liquido-rp').val(pagable_so);
                  
            });
          
      	}
      	function datos_socio(){
      		document.getElementById("ci-rp"). disabled= true;
      		document.getElementById("nombres-rp").disabled= true;
      		document.getElementById("apellidos-rp").disabled= true;
      		document.getElementById("direccion-rp").disabled= true;
      		document.getElementById("celular-rp").disabled= true;
      		document.getElementById("depar-ucb-rp").disabled= true;
      		document.getElementById("interno-rp").disabled= true;
      		document.getElementById("correo-rp").disabled= true;
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
                  $('#ci-rp').val(resp.ci);
                  $('#nombres-rp').val(resp.nombre+" "+resp.nombre2);
                  $('#apellidos-rp').val(resp.apellido_p+" "+resp.apellido_m);
                  $('#celular-rp').val(resp.celular);
                  $('#depar-ucb-rp').val(resp.departamento);
                  $('#direccion-rp').val(resp.direccion);
                  $('#interno-rp').val(resp.interno);
                  $('#correo-rp').val(resp.correos);

            });
      	}
      	function mandar_form_prestamo(){

      	//var nom = $( 'formprestamo').serialize();
      	var formData = new FormData($("#formprestamo")[0]);
      		console.log(s);

      	}
