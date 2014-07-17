$(document).ready(function() {

    // GET WIDTH WINDOW
    var w_Window = $(window).width();

    // SPRITELY
    $('#cloud').pan({
        fps: 30,
        speed: 2,
        dir: 'left'
    });

    $('#bee-01')
        .sprite({
            fps: 12,
            no_of_frames: 3
        })
        .spRandom({ // Bay tự do trong khoãng cách như dưới
            top: 70, // cao tối đa
            left: 150, // trái
            right: 200, // phải
            bottom: 150, // dưới
            speed: 4000, //  tốc độ đi chuyển giữa các điểm
            pause: 2000 // thời gian ngừng giữa các điểm
        });
    $('#bee-02')
        .sprite({
            fps: 12,
            no_of_frames: 3
        })
        .spRandom({ // Bay tự do trong khoãng cách như dưới
            top: 80, // cao tối đa
            left: 240, // trái
            right: 300, // phải
            bottom: 100, // dưới
            speed: 4000, //  tốc độ đi chuyển giữa các điểm
            pause: 1000 // thời gian ngừng giữa các điểm
        });
    $('#bee-03')
        .sprite({
            fps: 12,
            no_of_frames: 3
        })
        .spRandom({ // Bay tự do trong khoãng cách như dưới
            top: 30, // cao tối đa
            left: 300, // trái
            right: 200, // phải
            bottom: 70, // dưới
            speed: 3000, //  tốc độ đi chuyển giữa các điểm
            pause: 1000 // thời gian ngừng giữa các điểm
        });


    // CAMERA SLIDES
    $('.camera_wrap').camera({
        height: '400px',
        pagination: false,
        thumbnails: false,
        navigation: false,
        navigationHover: false,
        loader: 'none',
        playPause: false,
        slicedCols: 30,
        slicedRows: 20,
        imagePath: 'img/photo/'
    });

    // MAP
    $("#map").gmap3({
        marker: {
            address: "44 Trần Quý Cáp, Thạch Thang, Hải Châu, Đà Nẵng, Vietnam",
            // options: {
            //     icon: "img/front/marker.png"
            // }
        },
        map: {
            options: {
                zoom: 16,
                scrollwheel: false,
                draggable: true
            }
        }
    });

    // MAGNIFIC POPUP
    $('.list-img-popup').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: true,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }

    });

    // MENU RESPONSIVE
    $('#wd-menu-vertical').mmenu({
        "position": "right"
    });

});