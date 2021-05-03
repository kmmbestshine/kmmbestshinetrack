$(function(){        
    /* reportrange */
    if($("#reportrange").length > 0){   
        $("#reportrange").daterangepicker({                    
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM.DD.YYYY',
            separator: ' to ',
            startDate: moment().subtract('days', 29),
            endDate: moment()            
          },function(start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
        
        $("#reportrange span").html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }
    /* end reportrange */
    
    /* Rickshaw dashboard chart */
    // var seriesData = [ [], [] ];
    // var random = new Rickshaw.Fixtures.RandomData(1000);

    // for(var i = 0; i < 100; i++) {
        // random.addData(seriesData);
    // }

    // var rdc = new Rickshaw.Graph( {
            // element: document.getElementById("dashboard-chart"),
            // renderer: 'area',
            // width: $("#dashboard-chart").width(),
            // height: 250,
            // series: [{color: "#33414E",data: seriesData[0],name: 'New'}, 
                     // {color: "#1caf9a",data: seriesData[1],name: 'Returned'}]
    // } );

    // rdc.render();

    // var legend = new Rickshaw.Graph.Legend({graph: rdc, element: document.getElementById('dashboard-legend')});
    // var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({graph: rdc,legend: legend});
    // var order = new Rickshaw.Graph.Behavior.Series.Order({graph: rdc,legend: legend});
    // var highlight = new Rickshaw.Graph.Behavior.Series.Highlight( {graph: rdc,legend: legend} );        

    // var rdc_resize = function() {                
            // rdc.configure({
                    // width: $("#dashboard-area-1").width(),
                    // height: $("#dashboard-area-1").height()
            // });
            // rdc.render();
    // }

    // var hoverDetail = new Rickshaw.Graph.HoverDetail({graph: rdc});

    // window.addEventListener('resize', rdc_resize);        

    // rdc_resize();
    /* END Rickshaw dashboard chart */
    
    /* Donut dashboard chart */
    $.get("total/attendance",
        function(data)
        {
            console.log(data.data);
            //var present = data.data.totalStudent - (data.data.apsend + data.data.leave_student);
            var present= data.data.present;
            //alert('hi');
            console.log('present:'+present);
             Morris.Donut({
                  element: 'dashboard-donut-1',
                  data: [
                      {label: "Total Student", value: data.data.totalStudent},
                      {label: "Present", value: present},
                      {label: "Absent", value: data.data.apsend},
                      {label: "Leave", value: data.data.leave_student}
                  ],
                    colors: ['#33414E', '#1caf9a', '#FEA223','#7f3d84'],
                    resize: true
                });
        });
   
    /* END Donut dashboard chart */
	
	    /* Donut dashboard chart for employer */
    $.get("total/attendance/employer",
        function(data)
        {
            console.log(data.data);
            //var present = data.data.totalStudent - (data.data.apsend + data.data.leave_student);
            var present= data.data.present;
            //alert('hi');
            console.log('present:'+present);
             Morris.Donut({
                  element: 'dashboard-donut-2',
                  data: [
                      {label: "Total Employer", value: data.data.totalEmployer},
                      {label: "Present", value: present},
                      {label: "Absent", value: data.data.apsend},
                      {label: "Leave", value: data.data.leave_student}
                  ],
                    colors: ['#33414E', '#1caf9a', '#FEA223','#7f3d84'],
                    resize: true
                });
        });    
   
    /* END Donut dashboard chart */
    /* Bar dashboard chart */
  $.get("class/attendance/count", function(data){

    var nottaken=data.nottaken;
    var data = data.data;
   
    //console.log(nottaken);
    //console.log(data.length);
    if(data.length > 5)
    {
      var chartlen=(10*data.length)+1000;
      $(".attendance>.chart-holder").css({"width": chartlen});    
    }
    else
    {
     var chartlen=(5*data.length)+200;
      $(".attendance>.chart-holder").css({"width": chartlen});     
    }
    if(nottaken.length > 5)
    {
      var chartlen=(10*nottaken.length)+1000;
      $(".attendancenot>.chart-holder").css({"width": chartlen});    
    }
    else
    {
     var chartlen=(5*nottaken.length)+200;
      $(".attendancenot>.chart-holder").css({"width": chartlen});     
    }
    Morris.Bar({
        element: 'dashboard-bar-1',
       data: data,
        xkey: 'class',
        ykeys: ['present', 'absent', 'leave'],
        labels: ['Present', 'Absent', 'Leave'],
        hideHover: true,
        stacked: true,
        
        resize:true,
        xLabelMargin: 5,
         xLabelAngle:60,
        gridLineColor: '#E5E5E5'
    });
    //console.log(data);
    Morris.Bar({
        element: 'dashboard-bar-2',
       data: nottaken,
        xkey: 'class',
        ykeys: ['totalstudent'],
        labels: ['totalstudent'],
        hideHover: true,
        stacked: true,
        
        resize:true,
        xLabelMargin: 5,
         xLabelAngle:60,
        gridLineColor: '#E5E5E5'
    });
  });

//   Morris.Bar({
//   element: 'dashboard-bar-1',
//   data: [{"totalStudent":40,"ampresent":10,"amapsend":2,"amleave_student":1,"pmpresent":10,"pmapsend":2,"pmleave_student":1,"class":"1"},{"totalStudent":50,"present":0,"apsend":0,"leave_student":0,"class":"2"},{"present":0,"apsend":0,"leave_student":0,"class":"MA TAMIL"},{"present":0,"apsend":0,"leave_student":0,"class":"BA (TAMIL)"},{"present":0,"apsend":0,"leave_student":0,"class":"5 STD"},{"present":0,"apsend":0,"leave_student":0,"class":"bsc "},{"present":0,"apsend":0,"leave_student":0,"class":"BE"},{"present":0,"apsend":0,"leave_student":0,"class":"3rd"},{"present":0,"apsend":0,"leave_student":0,"class":"6th"},{"present":0,"apsend":0,"leave_student":0,"class":"B.sc zoology"},{"present":0,"apsend":0,"leave_student":0,"class":"9 STD"},{"present":0,"apsend":0,"leave_student":0,"class":"B.Com"},{"present":0,"apsend":0,"leave_student":0,"class":"7th"},{"present":0,"apsend":0,"leave_student":0,"class":"8th"},{"present":0,"apsend":0,"leave_student":0,"class":"10th"},{"present":0,"apsend":0,"leave_student":0,"class":"12"},{"present":0,"apsend":0,"leave_student":0,"class":"PUC"},{"present":0,"apsend":0,"leave_student":0,"class":"BBA"},{"present":0,"apsend":0,"leave_student":0,"class":"M.Sc (Maths)"}],
//   xkey: 'class',
//   ykeys: ['totalStudent','ampresent', 'amapsend','amleave_student','pmpresent', 'pmapsend','pmleave_student'],
//   labels: ['totalStudent','ampresent', 'amapsend','amleave_student','pmpresent', 'pmapsend','pmleave_student'],
//    resize: true,
//    gridTextSize: '15px',

// });
//     /* END Bar dashboard chart */
    
    /* Line dashboard chart */
    Morris.Line({
      element: 'dashboard-line-1',
      data: [
        { y: '2014-10-10', a: 2,b: 4},
        { y: '2014-10-11', a: 4,b: 6},
        { y: '2014-10-12', a: 7,b: 10},
        { y: '2014-10-13', a: 5,b: 7},
        { y: '2014-10-14', a: 6,b: 9},
        { y: '2014-10-15', a: 9,b: 12},
        { y: '2014-10-16', a: 18,b: 20}
      ],
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['Sales','Event'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#1caf9a','#33414E'],
      gridLineColor: '#E5E5E5'
    });   
    /* EMD Line dashboard chart */
    /* Moris Area Chart */
      
    /* End Moris Area Chart */
    /* Vector Map */
    var jvm_wm = new jvm.WorldMap({container: $('#dashboard-map-seles'),
                                    map: 'world_mill_en', 
                                    backgroundColor: '#FFFFFF',
                                    regionsSelectable: true,
                                    regionStyle: {selected: {fill: '#B64645'},
                                                    initial: {fill: '#33414E'}},
                                    markerStyle: {initial: {fill: '#1caf9a',
                                                   stroke: '#1caf9a'}},
                                    markers: [{latLng: [50.27, 30.31], name: 'Kyiv - 1'},                                              
                                              {latLng: [52.52, 13.40], name: 'Berlin - 2'},
                                              {latLng: [48.85, 2.35], name: 'Paris - 1'},                                            
                                              {latLng: [51.51, -0.13], name: 'London - 3'},                                                                                                      
                                              {latLng: [40.71, -74.00], name: 'New York - 5'},
                                              {latLng: [35.38, 139.69], name: 'Tokyo - 12'},
                                              {latLng: [37.78, -122.41], name: 'San Francisco - 8'},
                                              {latLng: [28.61, 77.20], name: 'New Delhi - 4'},
                                              {latLng: [39.91, 116.39], name: 'Beijing - 3'}]
                                });    
    /* END Vector Map */

    
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
    
});

