<x-front-layout title="{{ config('app.name') }}">

    @push('styles')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <style>
            /* Style for the autocomplete container */
            .product-suggestion {
                display: flex;
                /* Use flexbox to arrange image and name in a row */
                flex-direction: row;
                /* Ensure a horizontal layout */
                align-items: center;
                /* Vertically center items within the suggestion container */
                padding: 5px;
                /* Add padding for spacing */
                border-bottom: 1px solid #ccc;
                /* Add a border between suggestions */
            }

            /* Style for the product image */

            .product-image {
                /* width: 50px; */
                /* Adjust the width as needed */
                /* height: 50px; */
                /* Adjust the height as needed */
                margin-right: 10px;
                margin-left: 10px;
                /* Add margin for spacing between image and name */
            }

            /* Style for the product name */
            .product-name {
                font-weight: bold;
                /* Make the name text bold */
            }
        </style>
    @endpush

    @include('frontend.pages.home_parts.hero_section')

    @include('frontend.pages.home_parts.categories_section')



    {{-- @include('frontend.pages.home_parts.featured_categories') --}}

    @include('frontend.pages.home_parts.products_section')


    @include('frontend.pages.home_parts.banner_section')


    @include('frontend.pages.home_parts.special_offers')



    @include('frontend.pages.home_parts.filtered_products')


    @include('frontend.pages.home_parts.brands_section')



    {{-- blog section --}}
    @if ($websiteParts['parts']['Blog Section'] ?? null && $websiteParts['parts']['Blog Section'] == 1)
        <!-- Start Blog Section Area -->
        <section class="blog-section section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Latest News</h2>
                            <p>There are many variations of passages of Lorem
                                Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">eCommerce</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Gaming</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Electronic</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Electronics, instrumentation & control
                                        engineering
                                    </a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Section Area -->
    @endif



    @if ($websiteParts['parts']['Shipping Info Section'] ?? null && $websiteParts['parts']['Shipping Info Section   '] == 1)
        <!-- Start Shipping Info -->
        <section class="shipping-info">
            <div class="container">
                <ul>
                    <!-- Free Shipping -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-delivery"></i>
                        </div>
                        <div class="media-body">
                            <h5>Free Shipping</h5>
                            <span>On order over $99</span>
                        </div>
                    </li>
                    <!-- Money Return -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-support"></i>
                        </div>
                        <div class="media-body">
                            <h5>24/7 Support.</h5>
                            <span>Live Chat Or Call.</span>
                        </div>
                    </li>
                    <!-- Support 24/7 -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="media-body">
                            <h5>Online Payment.</h5>
                            <span>Secure Payment Services.</span>
                        </div>
                    </li>
                    <!-- Safe Payment -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-reload"></i>
                        </div>
                        <div class="media-body">
                            <h5>Easy Return.</h5>
                            <span>Hassle Free Shopping.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Shipping Info -->
    @endif


    @push('scripts')
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $.noConflict();
            jQuery(document).ready(function($) {

                $("#search").autocomplete({
                    source: function(request, response) {
                        // Send an AJAX request to fetch matching product data
                        $.ajax({
                            url: "{{ route('products.autocomplete') }}", // Replace with the actual route
                            dataType: "json",
                            data: {
                                term: request.term,
                            },
                            success: function(data) {
                                var mappedData = $.map(data, function(item) {
                                    // Create a custom HTML element for each suggestion
                                    var suggestionHtml =
                                        '<div class="product-suggestion">' +
                                        '<div class="product-image-container">' +
                                        '<img width="50" height="50" src="' + item
                                        .image_url +
                                        '" class="product-image" alt="Product Image">' +
                                        '</div>' +
                                        '<div class="product-details">' +
                                        '<div class="product-name">' + item.name +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';
                                    return {
                                        label: item
                                            .name, // Displayed in the autocomplete dropdown
                                        value: item
                                            .id, // Value placed in the input field when selected
                                        html: suggestionHtml, // Custom HTML for the suggestion
                                        slug: item.slug,
                                    };
                                });
                                // Display autocomplete suggestions with custom HTML
                                response(mappedData);
                            },
                        });
                    },
                    minLength: 1,
                    position: {
                        my: "left top+5",
                        at: "left bottom",
                    },
                    width: 300, // Adjust the width as needed
                    autoFill: true,
                    select: function(event, ui) {
                        $("#search").val(ui.item.label); // Set the product name in the input field
                        // Navigate to the product details page
                        window.location.href = "{{ route('products.show_product', '') }}/" + ui.item.slug;
                        // Prevent the default behavior of the autocomplete widget
                        return false;
                    },
                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    // Append the custom HTML to the autocomplete dropdown
                    return $("<li>")
                        .append(item.html)
                        .appendTo(ul);
                };
            })
        </script>
        <script type="text/javascript">
            //========= Hero Slider 
            tns({
                container: '.hero-slider',
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 0,
                items: 1,
                nav: false,
                controls: true,
                controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            });

            //======== Brand Slider
            tns({
                container: '.brands-logo-carousel',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    992: {
                        items: 6,
                    }
                }
            });

            //======== Brand Slider
            tns({
                container: '.categories-logo-carousel',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    992: {
                        items: 6,
                    }
                }
            });
        </script>

        <script>
            const finaleDate = new Date("December 15, 2023 00:00:00").getTime();

            const timer = () => {
                const now = new Date().getTime();
                let diff = finaleDate - now;
                if (diff < 0) {
                    document.querySelector('.alert').style.display = 'block';
                    document.querySelector('.container').style.display = 'none';
                }

                let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
                let seconds = Math.floor(diff % (1000 * 60) / 1000);

                days <= 99 ? days = `0${days}` : days;
                days <= 9 ? days = `00${days}` : days;
                hours <= 9 ? hours = `0${hours}` : hours;
                minutes <= 9 ? minutes = `0${minutes}` : minutes;
                seconds <= 9 ? seconds = `0${seconds}` : seconds;

                document.querySelector('#days').textContent = days;
                document.querySelector('#hours').textContent = hours;
                document.querySelector('#minutes').textContent = minutes;
                document.querySelector('#seconds').textContent = seconds;

            }
            timer();
            setInterval(timer, 1000);
        </script>

        <script>
            const csrf_token = "{{ csrf_token() }}";
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    @endpush

</x-front-layout>
