<div id="view{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Investers Details</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <ul class="list-ticked">
                    <li>Name: {{$user->firstname.' '.$user->lastname}}</li>
                    <li>Investment Number: {{$user->investment_number}}</li>
                </ul>
                <br><br>
                <h3>Investors Returns</h3>
                <ul class="list-ticked">
                    @foreach ($user->rois as $return)
                        <li>Return: {{$return->amount}} Updated: {{$return->created_at->diffForHumans()}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
