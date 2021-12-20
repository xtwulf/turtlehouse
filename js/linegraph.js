$(document).ready(function(){
    console.log("Test");
    $.ajax({
      url : "/turtlehouse/php/getdata.php",
      type : "GET",
      success : function(data){
        //console.log('Data: ' + data);
        data = JSON.parse(data);
  
        
        var date = [];
        var temp = [];
        var humidity = [];
  
        for(var i in data) {
          
          date.push(data[i].date);
          temp.push(data[i].temp);
          humidity.push(data[i].humidity);
          
        }

  console.log(temp);
  
	var chartdata = {
	  labels: date,
	  datasets: [
	      {
	      	label: "Temperatur",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(59, 89, 152, 0.75)",
          borderColor: "rgba(59, 89, 152, 1)",
          pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
          pointHoverBorderColor: "rgba(59, 89, 152, 1)",
          data: temp,
          cubicInterpolationMode: 'monotone'
		    }
    	]
    };



/*

        var chartdata = {
          labels: date,
          datasets: [
            {
              label: "Temperatur",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(59, 89, 152, 0.75)",
              borderColor: "rgba(59, 89, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: temp
            },
            {
              label: "Feuchtigkeit",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(255, 0, 0, 0.75)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: humidity
            }
            
          ]
        };
*/  

        var ctx = $("#temp_graph");
  
        var LineGraph = new Chart(ctx, {
          type: 'line',
          data: chartdata
        });
      },
      error : function(data) {
  
      }
    });
  });
