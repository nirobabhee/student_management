$(document).ready(function () {
      // sticky menu
      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $("#sticky-header").addClass("sticky-header");
        } else {
          $("#sticky-header").removeClass("sticky-header");
        }
      });

    // aside bar responsive
    $('.aside-bar-trigger').on('click', function(e) {
        e.preventDefault();
        $('.ts__sidebar').addClass('aside-is-active');
        $('.body__overlay').addClass('is-visible');
    
    });
    $('.aside-bar-close').on('click', function(e) {
        e.preventDefault();
        $('.ts__sidebar').removeClass('aside-is-active');
        $('.body__overlay').removeClass('is-visible');
    });
    
    $('.body__overlay').on('click', function() {
      $(this).removeClass('is-visible');
      $('.ts__sidebar').removeClass('aside-is-active');
    });
    
    
    $("#basicDate").flatpickr();
    


    $('.ts__sidebar .navbar-nav a').on('click', function () {
        $('.ts__sidebar .navbar-nav').find('a.active').removeClass('active');
        $(this).addClass('active');
    });
    $('.chek-all').on('click', function () {

        var checked = $(this).prop('checked');
        $(".check-element").each(function () {
            this.checked = checked;
        });
    });
   $('.select-status-head').on('change', function (e) {

      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var route = $(this).data('route');
      var ids=[];
      $( ".check-id:checked" ).each(function(){
        ids.push($(this).data('id'));
      })
      $.ajax({
          url: route+'/'+$(this).val()+'/'+JSON.stringify(ids),
          type: 'POST',
          dataType: 'json',
          data: {
              submit: true
          }
      }).always(function (data) {
          $('#takwa-table').DataTable().draw(false);
          $(".action-wrapper").css("display","none");
          $(".chek-all").prop("checked",false)
      });
  })

  //select-agent-head

  $('.employee-accept').on('change', function (e) {
    
    e.preventDefault();
    if(!$(this).val()){
      return;
    }
    let msg="";
    if($(this).val()==2){
      msg=window.prompt("Enter note");
    }
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var route = $(this).data('route');
  var ids=[];
  $( ".check-id:checked" ).each(function(){
    ids.push($(this).data('id'));
  })
  $.ajax({
      url: route+'/'+$(this).val()+'/'+JSON.stringify(ids)+"?msg="+msg,
      type: 'POST',
      dataType: 'json',
      data: {
          submit: true
      }
  }).always(function (data) {
      $('#takwa-table').DataTable().draw(false);
      $(".action-wrapper").css("display","none");
      $(".chek-all").prop("checked",false)
  });
  })
  $('.select-agent-head').on('change', function (e) {
    
    e.preventDefault();
    if(!$(this).val()){
      return;
    }
    let msg="";
    msg=window.prompt("Any message");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var route = $(this).data('route');
    var ids=[];
    $( ".check-id:checked" ).each(function(){
      ids.push($(this).data('id'));
    })
    $.ajax({
        url: route+'/'+$("#agent").val()+'/'+$(this).val()+'/'+JSON.stringify(ids)+"?msg="+msg,
        type: 'POST',
        dataType: 'json',
        data: {
            submit: true
        }
    }).always(function (data) {
        $('#takwa-table').DataTable().draw(false);
        $(".action-wrapper").css("display","none");
        $(".chek-all").prop("checked",false)
    });
})
    $('.delete-button-head').on('click', function (e) {
      if(!window.confirm("Are you sure to delete?")){
        return;
    }
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var route = $(this).data('route');
        var ids=[];
        $( ".check-id:checked" ).each(function(){
          ids.push($(this).data('id'));
        })
        $.ajax({
            url: route+'/'+JSON.stringify(ids),
            type: 'DELETE',
            dataType: 'json',
            data: {
                method: '_DELETE',
                submit: true
            }
        }).always(function (data) {
            $('#takwa-table').DataTable().draw(false);
            $(".action-wrapper").css("display","none");
            $(".chek-all").prop("checked",false)
        });
    })





      // radial progress bar 
      $('svg.radial-progress').each(function( index, value ) { 
        $(this).find($('circle.complete')).removeAttr( 'style' );
      });
      $(window).scroll(function(){
        $('svg.radial-progress').each(function( index, value ) { 
          // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
          if ( 
              $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
              $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
          ) {
              // Get percentage of progress
              percent = $(value).data('percentage');
              // Get radius of the svg's circle.complete
              radius = $(this).find($('circle.complete')).attr('r');
              // Get circumference (2πr)
              circumference = 2 * Math.PI * radius;
              // Get stroke-dashoffset value based on the percentage of the circumference
              strokeDashOffset = circumference - ((percent * circumference) / 100);
              // Transition progress for 1.25 seconds
              $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 650);
          }
        });
      }).trigger('scroll');
      
      // end radial progress bar 
      
      
      
      //-------------
          //- BAR CHART -
          //-------------
      
      
      
          var bChartData = {
            labels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
            datasets: [
              {
                label               : 'Earning',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [17, 38, 37, 20, 26,29, 45],
                backgroundColor: ["#199BFF","#199BFF","#199BFF", "#199BFF", "#199BFF", "#199BFF","#199BFF"],
                hoverBackgroundColor: '#5D788F',
              },
       
            ]
          }
      
      
      
      
          var barChartCanvas = $('#barChartEarning').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, bChartData)
          var temp0 = bChartData.datasets[0]
        
          barChartData.datasets[0] = temp0
      
          var barChartOptions = {
            legend: {
              display: false
          },
          tooltips: {
            custom: function(tooltip) {
      
              tooltip.displayColors = false;
            },
          mode: 'label',
          callbacks: {
            labelColor: function(tooltipItem, chart) {
                          return {
                              borderColor: 'rgb(255, 0, 0,0)',
                              backgroundColor: 'rgb(93, 120, 143)'
                          };
                      },
                      labelTextColor: function(tooltipItem, chart) {
                          return '#ffffff';
                      },
              label: function(tooltipItem, data) { 
                  var indice = tooltipItem.index;                 
                  return  '$'+data.datasets[0].data[indice]*1000;
              }
          },
          backgroundColor: 'rgb(93, 120, 143)'
      },
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            cornerRadius: 40,
            scales: {
      
                          responsive: !0,
                          maintainAspectRatio: !0,
                          yAxes: [{
     
                              gridLines: {
                                  color: "rgba(0, 0, 0, 0.03)",
                                  drawBorder: !1
                              },
                              ticks: {
                                min:0,
                                stepSize: 2,
                                  fontColor: "#858CA7",
                                  callback: function (a, e, r) {
                                      return a 
                                  }
                              }
                          }],
                          xAxes: [{
                            stacked: true,
                              barPercentage: .142,
                              gridLines: {
                                  display: !1,
                                  drawBorder: !1,
                                   color: "rgba(0, 0, 0, 0.03)",
                              },  
                              ticks: {
                                fontColor: "#858CA7",
                                fontSize:10,
                                fontStyle: "normal",                    
                            }
                          }]
                      },
          }
      
          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions,
            barRoundness: 0.3
          })
      
          // end bar chart
      
          
          //-------------
          //- BAR CHART 2 -
          //-------------
      
      
      
          var SalesChartData = {
            labels  : ['Jun', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug',"Sep","Oct","Nov","Des"],
            datasets: [
              {
                label               : 'Earning',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [25, 49, 52, 19, 47,36, 45,12,38,29,49,33],  
                backgroundColor: ["#199BFF","#199BFF","#199BFF", "#199BFF", "#199BFF", "#199BFF","#199BFF","#199BFF","#199BFF","#199BFF","#199BFF","#199BFF"],
                hoverBackgroundColor: '#5D788F',
              },
       
            ]
          }
      
          var barChartCanvas = $('#barChartSales').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, SalesChartData)
          var temp0 = SalesChartData.datasets[0]
        
          barChartData.datasets[0] = temp0
      
          var barChartOptions = {
            legend: {
              display: false
          },
          tooltips: {
            custom: function(tooltip) {
      
              tooltip.displayColors = false;
            },
          mode: 'label',
          callbacks: {
            labelColor: function(tooltipItem, chart) {
                          return {
                              borderColor: 'rgb(255, 0, 0,0)',
                              backgroundColor: 'rgb(93, 120, 143)'
                          };
                      },
                      labelTextColor: function(tooltipItem, chart) {
                          return '#ffffff';
                      },
              label: function(tooltipItem, data) { 
                  var indice = tooltipItem.index;                 
                  return  '$'+data.datasets[0].data[indice]*1000;
              }
          },
          backgroundColor: 'rgb(93, 120, 143)'
      },
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            cornerRadius: 40,
            scales: {
      
                          responsive: !0,
                          maintainAspectRatio: !0,
                          yAxes: [{         
                              gridLines: {
                                color: "rgba(0, 0, 0, 0.03)",
                                drawBorder: !1,
                            },
                              ticks: {
                                  min:0,
                                  stepSize: 3,
                                  fontColor: "#858CA7",
                                  callback: function (a, e, r) {
                                      return a 
                                  }
                              }
                          }],
                          xAxes: [{
                            stacked: true,
                              barPercentage: .23,
                              gridLines: {
                                  display: !1,
                                  drawBorder: !1
                              },ticks: {
                                fontColor: "#858CA7",
                                fontSize: 10,
                                fontStyle: "normal", 
                               },
                               
                          }]
                      },
          }
      
          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions,
            barRoundness: 0.3
          })
      
          // end bar chart2
      
      
      
          // curve mode
          var currved = $(".rounded-corner");
      if ($(".rounded-corner").length) {
          Chart.elements.Rectangle.prototype.draw = function () {
              var ctx = this._chart.ctx;
              var vm = this._view;
              var left, right, top, bottom, signX, signY, borderSkipped, radius;
              var borderWidth = vm.borderWidth;
              // Set Radius Here
              // If radius is large enough to cause drawing errors a max radius is imposed
              var cornerRadius = 20;
      
              if (!vm.horizontal) {
                  // bar
                  left = vm.x - vm.width / 2;
                  right = vm.x + vm.width / 2;
                  top = vm.y;
                  bottom = vm.base;
                  signX = 1;
                  signY = bottom > top ? 1 : -1;
                  borderSkipped = vm.borderSkipped || 'bottom';
              } else {
                  // horizontal bar
                  left = vm.base;
                  right = vm.x;
                  top = vm.y - vm.height / 2;
                  bottom = vm.y + vm.height / 2;
                  signX = right > left ? 1 : -1;
                  signY = 1;
                  borderSkipped = vm.borderSkipped || 'left';
              }
      
              // Canvas doesn't allow us to stroke inside the width so we can
              // adjust the sizes to fit if we're setting a stroke on the line
              if (borderWidth) {
                  // borderWidth shold be less than bar width and bar height.
                  var barSize = Math.min(Math.abs(left - right), Math.abs(top - bottom));
                  borderWidth = borderWidth > barSize ? barSize : borderWidth;
                  var halfStroke = borderWidth / 2;
                  // Adjust borderWidth when bar top position is near vm.base(zero).
                  var borderLeft = left + (borderSkipped !== 'left' ? halfStroke * signX : 0);
                  var borderRight = right + (borderSkipped !== 'right' ? -halfStroke * signX : 0);
                  var borderTop = top + (borderSkipped !== 'top' ? halfStroke * signY : 0);
                  var borderBottom = bottom + (borderSkipped !== 'bottom' ? -halfStroke * signY : 0);
                  // not become a vertical line?
                  if (borderLeft !== borderRight) {
                      top = borderTop;
                      bottom = borderBottom;
                  }
                  // not become a horizontal line?
                  if (borderTop !== borderBottom) {
                      left = borderLeft;
                      right = borderRight;
                  }
              }
      
              ctx.beginPath();
              ctx.fillStyle = vm.backgroundColor;
              ctx.strokeStyle = vm.borderColor;
              ctx.lineWidth = borderWidth;
      
              // Corner points, from bottom-left to bottom-right clockwise
              // | 1 2 |
              // | 0 3 |
              var corners = [
                  [left, bottom],
                  [left, top],
                  [right, top],
                  [right, bottom]
              ];
      
              // Find first (starting) corner with fallback to 'bottom'
              var borders = ['bottom', 'left', 'top', 'right'];
              var startCorner = borders.indexOf(borderSkipped, 0);
              if (startCorner === -1) {
                  startCorner = 0;
              }
      
              function cornerAt(index) {
                  return corners[(startCorner + index) % 4];
              }
      
              // Draw rectangle from 'startCorner'
              var corner = cornerAt(0);
              ctx.moveTo(corner[0], corner[1]);
      
              for (var i = 1; i < 4; i++) {
                  corner = cornerAt(i);
                  nextCornerId = i + 1;
                  if (nextCornerId == 4) {
                      nextCornerId = 0
                  }
      
                  nextCorner = cornerAt(nextCornerId);
      
                  width = corners[2][0] - corners[1][0];
                  height = corners[0][1] - corners[1][1];
                  x = corners[1][0];
                  y = corners[1][1];
      
                  var radius = cornerRadius;
      
                  // Fix radius being too large
                  if (radius > height / 2) {
                      radius = height / 2;
                  }
                  if (radius > width / 2) {
                      radius = width / 2;
                  }
      
                  ctx.moveTo(x + radius, y);
                  ctx.lineTo(x + width - radius, y);
                  ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
                  ctx.lineTo(x + width, y + height - radius);
                  ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
                  ctx.lineTo(x + radius, y + height);
                  ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
                  ctx.lineTo(x, y + radius);
                  ctx.quadraticCurveTo(x, y, x + radius, y);
      
              }
      
              ctx.fill();
              if (borderWidth) {
                  ctx.stroke();
              }
          };
      }
      
      
          // end curve mode
      
      
      
          // line graph start
          var ctx = document.getElementById('visitorChart').getContext('2d');
          var gradientFill = ctx.createLinearGradient(0,100, 0, 200);
          gradientFill.addColorStop(0, 'rgba(25,155,255,.3)');
          gradientFill.addColorStop(1, 'rgba(25,155,255,0)');
          var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line', // also try bar or other graph types
          
            // The data for our dataset
            data: {
              labels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
              // Information about the dataset
              datasets: [{
                // label: "Rainfall",
                backgroundColor: gradientFill,
                borderColor: '#199BFF',
                data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4],
              }]
            },
          
            // Configuration options
            options: {    
              responsive              : true,
              maintainAspectRatio     : false,
              datasetFill             : false,  
              legend: {
                display: false,
              },
              scales: {
                yAxes: [{
                  gridLines: {
                    color: "rgba(0, 0, 0, 0.03)",
                    drawBorder: !1,
                },
                ticks: {
                  // min: 0,
                  stepSize: 10,
                  fontColor: '#858CA7'
              },
                }],
                xAxes: [{
                   gridLines: {
                    display: !1,
                    drawBorder: !1
                },
                ticks: {
                  fontColor: '#858CA7',
                  fontSize: 10,
                  fontStyle: "normal", 
              },
                }]
              }
            }
          });
          
      
      
          // end line graph 
      
      
          // table row clickable
          $(".dashboard-table-row").click(function() {
            window.document.location = $(this).data("href");
        });


});
