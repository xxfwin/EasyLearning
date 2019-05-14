        $(document).ready(function(){

                $.post("http://xenoeye.org:49999/search/getSimilarCourses?query=artificial%20intelligence", { "code": $("#code").val() },
                    function(data){
					    $("#name").val(data.name);
						<!-- $("#balance").val(data.balance); -->
						$("#brand").val(data.brand);
						$("#inprice").val(data.inprice);
						$("#sellprice").val(data.sellprice);
						$("#spec").val(data.spec);
						$("#remark").val(data.remark);
                        $("#unit").val(data.unit);
                        <!-- alert(data.name); -->
                        <!-- alert("Hello"); -->
						
                    }, "json");
                    
          });