        <!-- Website Traffic -->
        <div class="col-4">
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Material Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    // legend: {
                    //   top: '1%',
                    //   left: 'center'
                    // },
                    series: [{
                      name: '{{ "Has taken" }}',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        @foreach ($data as $data)
                        {
                          value : {{ $data->sample->count("id") }},
                          name  : '{{ $data->name }}',
                        },
                        @endforeach
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
        </div>
        <!-- End Website Traffic -->
