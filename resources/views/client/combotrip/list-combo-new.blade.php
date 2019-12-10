<div id="gtco-section">
    <div id="gtco-features">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Combo Mới</h2>
                <p>Combo mới nhất</p>
            </div>
        </div>
    </div>
    <div class="gtco-container">

        <div class="row " style="padding:4em 0">
            @foreach ($combotripsNew as $key=>$combo)

            @if($key%2!=0)
            @include('client.combotrip.detail-combotrip-left')
            @else
            @include('client.combotrip.detail-combotrip-right')
            @endif

            @include('client.combotrip.book-combotrip-form')

            @endforeach
           
        </div>
    </div>
</div>