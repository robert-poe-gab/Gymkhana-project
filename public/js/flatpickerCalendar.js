flatpickr('#datetime', {
  mode: 'range',
  enableTime: true,
  dateFormat: 'Y-m-d H:i',
  minDate: 'today',
  locale: {
    firstDayOfWeek: 1,
    weekdays: {
      shorthand: ['Dg', 'Dl', 'Dt', 'Dc', 'Dj', 'Dv', 'Ds'],
      longhand: [
        'Diumenge',
        'Dilluns',
        'Dimarts',
        'Dimecres',
        'Dijous',
        'Divendres',
        'Dissabte'
      ]
    },
    months: {
      shorthand: [
        'Gen',
        'Feb',
        'Mar',
        'Abr',
        'Mai',
        'Jun',
        'Jul',
        'Ago',
        'Set',
        'Oct',
        'Nov',
        'Des'
      ],
      longhand: [
        'Gener',
        'Febrer',
        'Març',
        'Abril',
        'Maig',
        'Juny',
        'Juliol',
        'Agost',
        'Setembre',
        'Octubre',
        'Novembre',
        'Desembre'
      ]
    }
  },
  theme: 'dark',
  time_24hr: true
})
