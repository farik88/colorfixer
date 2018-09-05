<section class="demo-stages">
    <div class="inner">
        <div class="content">
            <ul>
                @for ($i = 1; $i <= 9; $i++)
                    <li class="stage">
                        <div class="inner">
                            <div class="number">
                                <span>{{ $i }}</span>
                            </div>
                            <div class="stage-content">
                                <div class="image">
                                    <img src="/img/demo_stage_{{ $i }}_454x283.jpg" alt="stage-{{ $i }}" title="">
                                </div>
                                <div class="text-content">
                                    <div class="title">
                                        <h3>{{ trans('demo-stages.title-'.$i) }}</h3>
                                    </div>
                                    <div class="text">
                                        <span>{{ trans('demo-stages.text-'.$i) }}</span>
                                    </div>
                                </div>
                                <div class="sub-text">
                                    <span>{{ trans('demo-stages.sub-text-'.$i) }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</section>