  <!-- Edit Review Modal -->
  <div class="modal fade add-review-modal" id="EditReviewModal" tabindex="-1" aria-labelledby="AddReviewModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="AddReviewModalLabel">Leave a Review</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>


              <form action="" method="post">
                  @csrf
                  <div class="modal-body">
                      {{-- <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-name">Your Name</label>
                            
                            <input class="form-control" name="name" value="{{ old('name', Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '') }}" type="text" id="review-name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="review-email">Your Email</label>
                            <input class="form-control" type="email"
                            name="email" value="{{ old('email', Auth::user() ? Auth::user()->email_address : '') }}"
                            id="review-email" required>
                        </div>
                    </div>
                </div> --}}
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="review-rating">Rating</label>
                                  <select class="form-control" name="rating" id="review-rating">
                                      <option value="5">5 Stars</option>
                                      <option value="4">4 Stars</option>
                                      <option value="3">3 Stars</option>
                                      <option value="2">2 Stars</option>
                                      <option value="1">1 Star</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="review-message">Review</label>
                          <textarea class="form-control" name="review" id="review-message" rows="8" required>
                              {{-- {{$review->rating}} --}}
                          </textarea>
                      </div>
                  </div>
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="modal-footer button">
                      <button type="submit" class="btn">Submit Review</button>
                  </div>

              </form>

          </div>
      </div>
  </div>
  <!-- End Edit Review Modal -->
