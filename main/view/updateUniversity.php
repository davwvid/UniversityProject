<form class="updateUniversity" action="" method="post">
    <div align="center">
        <label>Link</label>
        <div>
            <input link="link" type="text" placeholder="Link"
                   value="<?php echo $university->getLink(); ?>">
        </div>
    </div>
    </br></br>
    <div align="center">
        <label>Description</label>
        <div>
            <input link="description" type="text" placeholder="Description"
                   value="<?php echo $university->getDescription(); ?>">
        </div>
    </div>
    </br></br>
    <div align="center">
        <label>Email</label>
        <div>
            <input link="email" type="text" placeholder="Email"
                   value="<?php echo $university->getEmail(); ?>">
        </div>
    </div>
    </br></br>
    <div align="center">
        <div>
            <button onclick=document.write('<?php echo "Hallo" ?>'); class="btn btn-default">Update</button>
        </div>
    </div>
</form>