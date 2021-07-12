     
                    <h5>Welcome back {{ $logged_in_user->name }}</h5>
                        <?php 
                         $timeperiod = App\Models\Order::where('user_id', $logged_in_user->id)->latest("time_period","created_at")->limit(1)->first();
                               $addeddate = explode("ly",$timeperiod->time_period);
                               $dteStart = date('Y-m-d h:i:s', strtotime($timeperiod->created_at .'+1 '.$addeddate[0]));

                              $dteStart = new DateTime($dteStart);
                               $dteCurrent = new DateTime();
                               $differ = $dteStart->diff($dteCurrent);
                               $year = $differ->format('%y');
                               $month = $differ->format('%m');
                               $day = $differ->format('%d');
                               $hour = $differ->format('%h');
                      ?>
                 <span class="text-danger">Expired in {{ $year }} year {{ $month }} month {{ $day }} day {{ $hour }} hour </span> 
                <br /> <h6 class="text-center">Your {{ $timeperiod->time_period }} club</h6>