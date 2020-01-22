<!-- two input fields to sign in -->
<div class="card mx-auto" style="width: 30%;">
    <div class="card-body">
        <form action="/user/doLogin" method="post">
            <div class="form-group">
                <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-button">
                <input type="submit" value="Submit" class="btn btn-success">    
            </div>
        </form>
    </div>
</div>


