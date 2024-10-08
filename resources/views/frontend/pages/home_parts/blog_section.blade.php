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
