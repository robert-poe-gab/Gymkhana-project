$(document).ready(function () {
  $('#buscador').on('keyup', function () {
    const text = $(this).val().toLowerCase()
    let visible = 0

    $('.gymkhana-card').each(function () {
      const title = $(this).find('.gimkhana-title').text().toLowerCase()
      if (title.includes(text)) {
        $(this).fadeIn(150)
        visible++
      } else {
        $(this).fadeOut(150)
      }
    })

    if (visible === 0) {
      $('#noResults').removeClass('d-none')
    } else {
      $('#noResults').addClass('d-none')
    }
  })
})
