<form action="{{ route('withdraw.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" name="amount" id="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>