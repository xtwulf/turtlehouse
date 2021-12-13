$(document).ready(function(){
    $.ajax({
      url : "/turtlehouse/php/getdata.php",
      type : "GET",
      success : function(data){
        console.log(data);
        data = JSON.parse(data);
  
        
        var date = [];
        var temp = [];
        
        var userid = [];
        var facebook_follower = [];
        var twitter_follower = [];
        var googleplus_follower = [];
  
        for(var i in data) {
          
          date.push("Datum " + data[i].date);
          temp.push(data[i].temp);
          /*
          userid.push("UserID " + data[i].userid);
          facebook_follower.push(data[i].facebook);
          twitter_follower.push(data[i].twitter);
          googleplus_follower.push(data[i].googleplus);
          */
        }
  
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
            }
          ]
        };
  
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
