<div id="edit{{ $tool->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('tool.edit',['id' => $tool->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <label for="icon">Select Icon</label>
                        <select class="custom-select" name="icon" id="icon">
                            <optgroup label="Web Application Icons">
                                <option value="">select</option>
                                <option value="adjust">adjust</option>
                                <option value="asterisk">asterisk</option>
                                <option value="ban-circle">ban-circle</option>
                                <option value="bar-chart">bar-chart</option>
                                <option value="barcode">barcode</option>
                                <option value="beaker">beaker</option>
                                <option value="beer">beer</option>
                                <option value="bell">bell</option>
                                <option value="bell-alt">bell-alt</option>
                                <option value="bolt">bolt</option>
                                <option value="book">book</option>
                                <option value="bookmark">bookmark</option>
                                <option value="bookmark-empty">bookmark-empty</option>
                                <option value="briefcase">briefcase</option>
                                <option value="bullhorn">bullhorn</option>
                                <option value="calendar">calendar</option>
                                <option value="camera">camera</option>
                                <option value="camera-retro">camera-retro</option>
                                <option value="certificate">certificate</option>
                                <option value="check">check</option>
                                <option value="check-empty">check-empty</option>
                                <option value="circle">circle</option>
                                <option value="circle-blank">circle-blank</option>
                                <option value="cloud">cloud</option>
                                <option value="cloud-download">cloud-download</option>
                                <option value="cloud-upload">cloud-upload</option>
                                <option value="coffee">coffee</option>
                                <option value="cog">cog</option>
                                <option value="cogs">cogs</option>
                                <option value="comment">comment</option>
                                <option value="comment-alt">comment-alt</option>
                                <option value="comments">comments</option>
                                <option value="comments-alt">comments-alt</option>
                                <option value="credit-card">credit-card</option>
                                <option value="dashboard">dashboard</option>
                                <option value="desktop">desktop</option>
                                <option value="download">download</option>
                                <option value="download-alt">download-alt</option>
                                <option value="edit">edit</option>
                                <option value="envelope">envelope</option>
                                <option value="envelope-alt">envelope-alt</option>
                                <option value="exchange">exchange</option>
                                <option value="exclamation-sign">exclamation-sign</option>
                                <option value="external-link">external-link</option>
                                <option value="eye-close">eye-close</option>
                                <option value="eye-open">eye-open</option>
                                <option value="facetime-video">facetime-video</option>
                                <option value="fighter-jet">fighter-jet</option>
                                <option value="film">film</option>
                                <option value="filter">filter</option>
                                <option value="fire">fire</option>
                                <option value="flag">flag</option>
                                <option value="folder-close">folder-close</option>
                                <option value="folder-open">folder-open</option>
                                <option value="folder-close-alt">folder-close-alt</option>
                                <option value="folder-open-alt">folder-open-alt</option>
                                <option value="food">food</option>
                                <option value="gift">gift</option>
                                <option value="glass">glass</option>
                                <option value="globe">globe</option>
                                <option value="group">group</option>
                                <option value="hdd">hdd</option>
                                <option value="headphones">headphones</option>
                                <option value="heart">heart</option>
                                <option value="heart-empty">heart-empty</option>
                                <option value="home">home</option>
                                <option value="inbox">inbox</option>
                                <option value="info-sign">info-sign</option>
                                <option value="key">key</option>
                                <option value="leaf">leaf</option>
                                <option value="laptop">laptop</option>
                                <option value="legal">legal</option>
                                <option value="lemon">lemon</option>
                                <option value="lightbulb">lightbulb</option>
                                <option value="lock">lock</option>
                                <option value="unlock">unlock</option>
                                <option value="magic">magic</option>
                                <option value="magnet">magnet</option>
                                <option value="map-marker">map-marker</option>
                                <option value="minus">minus</option>
                                <option value="minus-sign">minus-sign</option>
                                <option value="mobile-phone">mobile-phone</option>
                                <option value="money">money</option>
                                <option value="move">move</option>
                                <option value="music">music</option>
                                <option value="off">off</option>
                                <option value="ok">ok</option>
                                <option value="ok-circle">ok-circle</option>
                                <option value="ok-sign">ok-sign</option>
                                <option value="pencil">pencil</option>
                                <option value="picture">picture</option>
                                <option value="plane">plane</option>
                                <option value="plus">plus</option>
                                <option value="plus-sign">plus-sign</option>
                                <option value="print">print</option>
                                <option value="pushpin">pushpin</option>
                                <option value="qrcode">qrcode</option>
                                <option value="question-sign">question-sign</option>
                                <option value="quote-left">quote-left</option>
                                <option value="quote-right">quote-right</option>
                                <option value="random">random</option>
                                <option value="refresh">refresh</option>
                                <option value="remove">remove</option>
                                <option value="remove-circle">remove-circle</option>
                                <option value="remove-sign">remove-sign</option>
                                <option value="reorder">reorder</option>
                                <option value="reply">reply</option>
                                <option value="resize-horizontal">resize-horizontal</option>
                                <option value="resize-vertical">resize-vertical</option>
                                <option value="retweet">retweet</option>
                                <option value="road">road</option>
                                <option value="rss">rss</option>
                                <option value="screenshot">screenshot</option>
                                <option value="search">search</option>
                                <option value="share">share</option>
                                <option value="share-alt">share-alt</option>
                                <option value="shopping-cart">shopping-cart</option>
                                <option value="signal">signal</option>
                                <option value="signin">signin</option>
                                <option value="signout">signout</option>
                                <option value="sitemap">sitemap</option>
                                <option value="sort">sort</option>
                                <option value="sort-down">sort-down</option>
                                <option value="sort-up">sort-up</option>
                                <option value="spinner">spinner</option>
                                <option value="star">star</option>
                                <option value="star-empty">star-empty</option>
                                <option value="star-half">star-half</option>
                                <option value="tablet">tablet</option>
                                <option value="tag">tag</option>
                                <option value="tags">tags</option>
                                <option value="tasks">tasks</option>
                                <option value="thumbs-down">thumbs-down</option>
                                <option value="thumbs-up">thumbs-up</option>
                                <option value="time">time</option>
                                <option value="tint">tint</option>
                                <option value="trash">trash</option>
                                <option value="trophy">trophy</option>
                                <option value="truck">truck</option>
                                <option value="umbrella">umbrella</option>
                                <option value="upload">upload</option>
                                <option value="upload-alt">upload-alt</option>
                                <option value="user">user</option>
                                <option value="user-md">user-md</option>
                                <option value="volume-off">volume-off</option>
                                <option value="volume-down">volume-down</option>
                                <option value="volume-up">volume-up</option>
                                <option value="warning-sign">warning-sign</option>
                                <option value="wrench">wrench</option>
                                <option value="zoom-in">zoom-in</option>
                                <option value="zoom-out">zoom-out</option>
                              </optgroup>
                              <optgroup label="Text Editor Icons">
                                <option value="file">file</option>
                                <option value="file-alt">file-alt</option>
                                <option value="cut">cut</option>
                                <option value="copy">copy</option>
                                <option value="paste">paste</option>
                                <option value="save">save</option>
                                <option value="undo">undo</option>
                                <option value="repeat">repeat</option>
                                <option value="text-height">text-height</option>
                                <option value="text-width">text-width</option>
                                <option value="align-left">align-left</option>
                                <option value="align-center">align-center</option>
                                <option value="align-right">align-right</option>
                                <option value="align-justify">align-justify</option>
                                <option value="indent-left">indent-left</option>
                                <option value="indent-right">indent-right</option>
                                <option value="font">font</option>
                                <option value="bold">bold</option>
                                <option value="italic">italic</option>
                                <option value="strikethrough">strikethrough</option>
                                <option value="underline">underline</option>
                                <option value="link">link</option>
                                <option value="paper-clip">paper-clip</option>
                                <option value="columns">columns</option>
                                <option value="table">table</option>
                                <option value="th-large">th-large</option>
                                <option value="th">th</option>
                                <option value="th-list">th-list</option>
                                <option value="list">list</option>
                                <option value="list-ol">list-ol</option>
                                <option value="list-ul">list-ul</option>
                                <option value="list-alt">list-alt</option>
                              </optgroup>
                              <optgroup label="Directional Icons">
                                <option value="angle-left">angle-left</option>
                                <option value="angle-right">angle-right</option>
                                <option value="angle-up">angle-up</option>
                                <option value="angle-down">angle-down</option>
                                <option value="arrow-down">arrow-down</option>
                                <option value="arrow-left">arrow-left</option>
                                <option value="arrow-right">arrow-right</option>
                                <option value="arrow-up">arrow-up</option>
                                <option value="caret-down">caret-down</option>
                                <option value="caret-left">caret-left</option>
                                <option value="caret-right">caret-right</option>
                                <option value="caret-up">caret-up</option>
                                <option value="chevron-down">chevron-down</option>
                                <option value="chevron-left">chevron-left</option>
                                <option value="chevron-right">chevron-right</option>
                                <option value="chevron-up">chevron-up</option>
                                <option value="circle-arrow-down">circle-arrow-down</option>
                                <option value="circle-arrow-left">circle-arrow-left</option>
                                <option value="circle-arrow-right">circle-arrow-right</option>
                                <option value="circle-arrow-up">circle-arrow-up</option>
                                <option value="double-angle-left">double-angle-left</option>
                                <option value="double-angle-right">double-angle-right</option>
                                <option value="double-angle-up">double-angle-up</option>
                                <option value="double-angle-down">double-angle-down</option>
                                <option value="hand-down">hand-down</option>
                                <option value="hand-left">hand-left</option>
                                <option value="hand-right">hand-right</option>
                                <option value="hand-up">hand-up</option>
                                <option value="circle">circle</option>
                                <option value="circle-blank">circle-blank</option>
                              </optgroup>
                              <optgroup label="Video Player Icons">
                                <option value="play-circle">play-circle</option>
                                <option value="play">play</option>
                                <option value="pause">pause</option>
                                <option value="stop">stop</option>
                                <option value="step-backward">step-backward</option>
                                <option value="fast-backward">fast-backward</option>
                                <option value="backward">backward</option>
                                <option value="forward">forward</option>
                                <option value="fast-forward">fast-forward</option>
                                <option value="step-forward">step-forward</option>
                                <option value="eject">eject</option>
                                <option value="fullscreen">fullscreen</option>
                                <option value="resize-full">resize-full</option>
                                <option value="resize-small">resize-small</option>
                              </optgroup>
                              <optgroup label="Social Icons">
                                <option value="phone">phone</option>
                                <option value="phone-sign">phone-sign</option>
                                <option value="facebook">facebook</option>
                                <option value="facebook-sign">facebook-sign</option>
                                <option value="twitter">twitter</option>
                                <option value="twitter-sign">twitter-sign</option>
                                <option value="github">github</option>
                                <option value="github-alt">github-alt</option>
                                <option value="github-sign">github-sign</option>
                                <option value="linkedin">linkedin</option>
                                <option value="linkedin-sign">linkedin-sign</option>
                                <option value="pinterest">pinterest</option>
                                <option value="pinterest-sign">pinterest-sign</option>
                                <option value="google-plus">google-plus</option>
                                <option value="google-plus-sign">google-plus-sign</option>
                                <option value="sign-blank">sign-blank</option>
                              </optgroup>
                              <optgroup label="Medical Icons">
                                <option value="ambulance">ambulance</option>
                                <option value="beaker">beaker</option>
                                <option value="h-sign">h-sign</option>
                                <option value="hospital">hospital</option>
                                <option value="medkit">medkit</option>
                                <option value="plus-sign-alt">plus-sign-alt</option>
                                <option value="stethoscope">stethoscope</option>
                                <option value="user-md">user-md</option>
                              </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Name of the tool" required name="name" value="{{ $tool->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="color" class="form-control" placeholder="select color for the tool" required name="color" value="{{ $tool->color }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

