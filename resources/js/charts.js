import ApexCharts from 'apexcharts';

document.addEventListener('DOMContentLoaded', () => {
  const trafficEl = document.querySelector('#apexChartTrafficStats');
  const deviceEl = document.querySelector('#apexDeviceCharts');

  if (!trafficEl || !deviceEl) {
    return;
  }

  const trafficOptions = {
    theme: {
      mode: 'dark',
      palette: 'palette1',
      monochrome: {
        enabled: false,
        color: '#255aee',
        shadeTo: 'light',
        shadeIntensity: 0.65,
      },
    },
    colors: ['#2163e8'],
    fill: {
      colors: ['#1A73E8', '#B32824'],
    },
    series: [{
      name: 'کاربران',
      data: [100, 401, 305, 501, 409, 602, 609, 901, 848, 602, 809, 901],
    }],
    chart: {
      height: '400',
      width: '600px',
      type: 'area',
      background: 'transparent',
      toolbar: {
        show: false,
      },
    },
    grid: {
      strokeDashArray: 4,
      position: 'back',
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: 'smooth',
    },
    legend: {
      show: true,
      horizontalAlign: 'right',
      position: 'top',
      markers: {
        width: 8,
        height: 8,
      },
    },
    xaxis: {
      labels: {
        show: true,
      },
      axisBorder: {
        show: false,
      },
      categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy HH:mm',
      },
    },
  };

  new ApexCharts(trafficEl, trafficOptions).render();

  const deviceOptions = {
    colors: ['#2163e8', '#0cbc87', '#d6293e', '#f7c32e'],
    labels: ['مرورگر', 'شبکه های اجتماعی', 'وب سایت', 'سایر'],
    series: [44, 55, 41, 17],
    legend: {
      show: false,
      position: 'right',
    },
    chart: {
      height: 300,
      type: 'donut',
    },
    plotOptions: {
      pie: {
        donut: {
          size: '75%',
        },
        offsetY: 20,
      },
      stroke: {
        colors: undefined,
      },
    },
    stroke: {
      show: false,
    },
    dataLabels: {
      enabled: false,
    },
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          height: 200,
        },
        legend: {
          show: false,
        },
      },
    }],
  };

  new ApexCharts(deviceEl, deviceOptions).render();
});
