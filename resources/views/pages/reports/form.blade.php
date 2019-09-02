@if(Auth::user()->head_cluster_area == ucfirst($report->cluster_area) || Auth::user()->head_department == $report->department)
    <form method="POST" action="{{ action('ReportController@updateStatus', $report->id) }}" class="m-auto">
        @csrf
        <input type="hidden" name="type" value="{{Auth::user()->type}}">
        <div class="mt-4 mb-3">
            <p class="font-weight-bold">Remarks</p><br>
            <div class="col-md-12">
                <textarea id="comment" type="text" rows="10"
                          class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                          name="comment" required autofocus></textarea>

                @if ($errors->has('comment'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                @endif
            </div>
        </div>
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i> Validate</button>
        </div>
    </form>
@endif