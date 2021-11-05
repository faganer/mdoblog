// Header
// 标题hover样式
$('.blog-header-logo').on('mouseover', function () {
  $(this).addClass('text-decoration-underline').removeClass('text-decoration-none')
})
$('.blog-header-logo').on('mouseleave', function () {
  $(this).addClass('text-decoration-none').removeClass('text-decoration-underline')
})
// 构建导航栏
let navHtml = ''
$('.nav-hidden li').each(function () {
  const aClass = $(this).attr('class') + ' p-2 link-secondary'
  $(this).find('a').addClass(aClass)
  const aHtml = $(this).html()
  navHtml += aHtml
})
$('.nav-scroller .nav').html(navHtml)
$('.site-offcanvas-nav li').addClass('nav-item')
$('.site-offcanvas-nav li a').addClass('nav-link')
$('.site-offcanvas-nav li.current-menu-item a').addClass('active')

// Post list
$('.blog-post-list li a').on('mouseover', function () {
  $(this).addClass('text-decoration-underline').removeClass('text-decoration-none')
})
$('.blog-post-list li a').on('mouseleave', function () {
  $(this).addClass('text-decoration-none').removeClass('text-decoration-underline')
})

if ($('.blog-pagination-item:first').html()) {
  $('.blog-pagination-item:first a').addClass('btn btn-outline-primary rounded-pill')
}
if ($('.blog-pagination-item:last').html()) {
  $('.blog-pagination-item:last a').addClass('btn btn-outline-secondary rounded-pill')
} else {
  $('.blog-pagination-item:last').remove()
}
$('.list-card-item').on('mouseover', function () {
  $(this).find('.card').addClass('shadow')
  $(this).siblings('.list-card-item').find('.card').removeClass('shadow')
})
$('.list-card-item').on('mouseleave', function () {
  $(this).find('.card').removeClass('shadow')
})
if ($('.blog-post-theme').length > 0) {
  const tiTop = $('.blog-post-theme').offset().top
  const tiLeft = $('.blog-post-theme').offset().left
  const tiWidth = $('.blog-post-theme').width()
  $(window).on('scroll', function () {
    if ($(document).scrollTop() >= tiTop) {
      $('.blog-post-theme').addClass('position-fixed top-0 blog-post-theme-fixed').css({ left: tiLeft, width: tiWidth })
    } else {
      $('.blog-post-theme').removeClass('position-fixed top-0 blog-post-theme-fixed').css({ left: 'auto', width: 'auto' })
    }
  })
}

// Sidebar
$('.widget-area .widget ul').addClass('list-unstyled mb-0')

// Home
$('.otdf-item:first .otdf-item-cat a').addClass('link-primary text-decoration-none')
$('.otdf-item:last .otdf-item-cat a').addClass('link-success text-decoration-none')

// Single
$('.single .blog-post-content table').addClass('table').wrap('<div class="table-responsive"></div>')
// 去掉single page figure尺寸
$('.single figure,.page figure').removeAttr('style')
$('.single figure img,.page figure img')
  .removeAttr('width')
  .removeAttr('height')
$('.single figure,.page figure').css('opacity', '1')
$('.post-content img').removeAttr('width').removeAttr('height')
// blockquote
$('.blog-post-content blockquote').addClass('blockquote position-relative bg-light mt-2 py-2 ps-4 pe-2')
// 分享
$('.single .modal-share-wechat .qrcode').qrcode({
  width: 128,
  height: 128,
  text: window.location.href
})
$('.blog-post-share span').on('click', function () {
  const title = 'title=' + $('title').text() // 标题
  const url = '&url=' + window.location.href // 链接
  const appkey = '&appkey=' + '3411539221' // 微博appkey
  let WeibPic = ''
  let QQPics = ''
  if ($('.post-content img').length > 0) {
    WeibPic = '&pic=' + $('.post-content img')[0].src
    QQPics = '&pics=' + $('.post-content img')[0].src
  }

  const stringWeibo = 'https://service.weibo.com/share/share.php?' + title + url + appkey + WeibPic + '&content=utf-8&searchPic=true&language=zh_ch'
  const stringQQ = 'https://connect.qq.com/widget/shareqq/index.html?' + title + url + QQPics

  // 分享到微博
  if ($(this).hasClass('share-weibo')) {
    window.open(stringWeibo, 'newwindow')
  }

  // 分享到QQ
  if ($(this).hasClass('share-qq')) {
    window.open(stringQQ, 'newwindow')
  }

  // 分享到微信
  if ($(this).hasClass('share-wechat')) {
    // eslint-disable-next-line no-undef
    Swal.fire({
      customClass: {
        container: 'swal2-wechat',
        cancelButton: 'btn btn-primary'
      },
      html: '<div class="swal2-wechat-qrcode mb-3"></div><p>使用微信“扫一扫”即可将本文分享到朋友圈</p>',
      // showCloseButton: true,
      title: '分享到微信',
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: '关闭',
      buttonsStyling: false,
      focusCancel: false
    })
    $('.swal2-wechat-qrcode').qrcode({
      width: 200,
      height: 200,
      text: window.location.href
    })
  }
})
// figcaption
$('figcaption.wp-caption-text').addClass('mt-2')
$('figure img').addClass('shadow-sm')
// 评论
$('.single .form-submit .submit').addClass('btn btn-outline-primary')
$('.comment-author .fn a').attr('target', '_blank')
$('.comment-form-comment textarea').attr('rows', '3')
$('.comment-form-comment label,.comment-form-author label,.comment-form-email label,.comment-form-url label').addClass('form-label')
$('.comment-form-comment textarea,.comment-form-author input,.comment-form-email input,.comment-form-url input').addClass('form-control')
$('.comment-body').addClass('py-3')
$('.comment-meta').addClass('d-flex align-items-center mb-3')

// Plugins
$('.breadcrumb_last').addClass('fw-normal')
