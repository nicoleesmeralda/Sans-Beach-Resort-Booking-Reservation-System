@php
    $setting = App\Models\SiteSetting::find(1);
@endphp

<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-45 pb-50 text-center">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset($setting->logo) }}" alt="Images">
                            </a>
                        </div>
                        
                        <ul class="footer-list-contact list-unstyled" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px; list-style: none; padding: 0; margin: 0;">
                            <li style="display: flex; align-items: center; justify-content: center; text-align: center;">
                                <i class='bx bx-home-alt' style="margin-right: 8px; font-size: 18px;"></i>
                                <span>{{ $setting->address }}</span>
                            </li>
                            <li style="display: flex; align-items: center; justify-content: center; text-align: center;">
                                <i class='bx bx-phone-call' style="margin-right: 8px; font-size: 18px;"></i>
                                <span>{{ $setting->phone }}</span>
                            </li>
                            <li style="display: flex; align-items: center; justify-content: center; text-align: center;">
                                <i class='bx bx-envelope' style="margin-right: 8px; font-size: 18px;"></i>
                                <span>{{ $setting->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copy-right-area">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="copy-right-text text-center">
                        <p>
                            {{ $setting->copyright }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
