<div class="row">
                <div class="col-lg-6">
                  <div class="card-body">
                    <strong> Document category</strong>
                    <p class="text-muted">
                      {{ $documents[0]->document_category ?? '' }}
                    </p>
                    <hr>

                    <strong>Document name</strong>
                    <p class="text-muted">
                      {{ $documents[0]->document_name ?? '' }}
                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body">

                    <strong>Attachemnt</strong>
                    <p class="text-muted">
                      <a href="{{url('/')}}/public/Employee/{{$documents[0]->attachment ?? '' }}" target="_blank">
                        {{ $documents[0]->attachment ?? ''}} </a>
                    </p>
                    <hr>
                    <?php if(count($documents) > 0): ?>
                    <?php
                      date_default_timezone_set('Asia/Calcutta');
                      $datetime = new DateTime();
                      $date_today = $datetime->format('Y-m-d');
                      $date_now = time(); // or your date as well
                      $expire_date = strtotime($documents[0]->document_expiry);
                      $datediff = $date_now - $expire_date;
                      $diff = round($datediff / (60 * 60 * 24)) - 1;
                    ?>
                    @if($diff == 0)
                    <p class="text-warning">
                    <strong>Document expiry</strong>
                    <p class=" text-warning">{{ $documents[0]->document_expiry ?? '' }} goin to expire today</p>
                    </p>
                    @elseif($diff < 0)
                    <p class="text-info">
                    <strong>Document expiry</strong>
                    <p class=" text-info">{{ $documents[0]->document_expiry ?? '' }} will expire soon</p>
                    </p>
                    @else
                    <p class="text-danger">
                    <strong>Document expiry</strong>
                    <p class=" text-danger">{{ $documents[0]->document_expiry ?? '' }} already expired</p>
                    </p>
                    @endif
                    <?php else:  $diff = 0; ?>
                    <strong>Document expiry</strong>
                    <p class=" text-muted"></p>
                    <?php endif; ?>
                    <hr>
                  </div>
                </div>
              </div>