<div wire:key="{{ $band->id }}">
    <div wire:ignore.self class="modal fade" id="viewBand{{ $band->id }}" tabindex="-1"
        aria-labelledby="viewBandLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="color:rgb(88, 164, 247)">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage') }}/{{ $band->image }}"
                            class="rounded-circle w-25" alt="...">
                    </div>
                    <h3 class="text-center">{{ $band->bandName }}</h3>
                    <hr>
                    @php
                    $feedbacks = $this->getFeedbacks($band->id);
                @endphp

                <table class="table table-striped">
                    <h6>Feedbacks and Ratings</h6>
                    @foreach ($feedbacks as $fdbck)
                            <tr>
                                <td class="fw-bold">Feedback</td>
                                <td scope="row">{{ $fdbck->feedback }}</td>

                            </tr>
                            <tr>
                                <td>
                                    <tr>
                                        <td class="fw-bold">Rate</td>
                                        <td>
                                          <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                              @if ($i <= $fdbck->rating)
                                                <span class="star-fill"></span>
                                              @else
                                                <span class="star-empty"></span>
                                              @endif
                                            @endfor
                                          </div>
                                        </td>
                                      </tr>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Rated by:</td>
                                <td>{{ $fdbck->user->name }}</td>
                            </tr>


                      @endforeach
                </table>

                    <p class="text-center">{{ $band->description }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('booking', ['band' => $band->id])}}" class="btn btn-primary rounded-pill">Book Now</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
