/**
 *
 * Dashboards Doctor
 *
 * Dashboards Doctor page content scripts. Initialized from scripts.js file.
 *
 *
 */

class DashboardsDoctor {
  constructor() {
    this._ageChart = null;
    this._genderChart = null;
    this._calendar = null;
    if (document.getElementById('scheduleModal')) {
      this._scheduleModal = new bootstrap.Modal(document.getElementById('scheduleModal'));
    }

    // Initialization of the page plugins
    this._initAgeChart();
    this._initGenderChart();
    this._initCalendar();

    this._initEvents();
  }

  _initEvents() {
    // Listening for color change events to update charts
    document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
      this._ageChart && this._ageChart.destroy();
      this._initAgeChart();
      this._genderChart && this._genderChart.destroy();
      this._initGenderChart();
    });
  }

  // Age chart initialization
  _initAgeChart() {
    if (document.getElementById('ageChart')) {
      const ageChartEl = document.getElementById('ageChart').getContext('2d');
      this._ageChart = new Chart(ageChartEl, {
        type: 'horizontalBar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 200,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: [],
          datasets: [
            {
              label: 'Appointments',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [],
              borderWidth: 2,
            },
          ],
        },
      });
    }
    window.SalesChart = this._ageChart;
  }

  // Gender chart initialization
  _initGenderChart() {
    if (document.getElementById('genderChart')) {
      const genderChartEl = document.getElementById('genderChart');
      this._genderChart = new Chart(genderChartEl, {
        type: 'doughnut',
        data: {
          labels: [],
          datasets: [
            {
              label: '',
              borderColor: [Globals.primary, Globals.secondary],
              backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)'],
              borderWidth: 2,
              data: [],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 70,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
    window.StatusChart = this._genderChart;
  }

  _initCalendar() {
    if (document.getElementById('calendar')) {
      this._calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        timeZone: 'local',
        themeSystem: 'bootstrap',
        slotMinTime: '08:00:00',
        slotMaxTime: '20:00:00',
        editable: true,
        dayMaxEvents: true,
        eventTimeFormat: {
          hour: '2-digit',
          minute: '2-digit',
          meridiem: false,
          hour12: false,
        },
        headerToolbar: {
          start: 'title',
          center: '',
          end: 'prev,next',
        },
        bootstrapFontAwesome: {
          prev: ' cs-chevron-left',
          next: ' cs-chevron-right',
          prevYear: ' cs-arrow-double-left',
          nextYear: ' cs-arrow-double-right',
        },
        dateClick: (data) => {
          if (this._scheduleModal) {
            this._scheduleModal.show();
            DateClicked(data);
          }
        },
        // events: [
          // {
          //   id: 1,
          //   title: 'Crash Course',
          //   start: '2021-06-26',
          //   color: '',
          //   display: 'list-item',
          // },
          // {
          //   id: 2,
          //   title: 'Sale Meetings',
          //   start: '2021-10-09',
          //   color: '',
          //   display: 'list-item',
          // },
          // {
          //   id: 3,
          //   title: 'Birthday Party',
          //   start: '2021-10-22',
          //   display: 'list-item',
          // },
          // {
          //   id: 4,
          //   title: 'Meeting',
          //   start: '2021-10-22',
          //   display: 'list-item',
          // },
        // ],
      });
      this._calendar.render();
      window.calendar = this._calendar;
    }
  }
}
