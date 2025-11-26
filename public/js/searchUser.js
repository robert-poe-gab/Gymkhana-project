$(document).ready(function () {
  $('#searcherUser').on('keyup', function () {
    const text = $(this).val().toLowerCase()
    let visible = 0

    $('.users-row').each(function () {
      const title = $(this).find('.userEmail').text().toLowerCase()
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
