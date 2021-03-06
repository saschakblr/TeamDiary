<!-- four input fields to create a new profile -->
<div class="card mx-auto" style="width: 30%;">
    <div class="card-body">
        <form action="/user/doCreate" method="post">
            <div class="form-group">
                <input type="text" name="firstname" placeholder="Firstname" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-button">
                <input type="submit" name="send" value="Submit" class="btn btn-success">    
            </div>
        </form>
        <p>If you already have an Account click <a href="/user/login">here.</a></p>
    </div>
</div>


