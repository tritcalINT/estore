<?php

$sql = "select  orders.*,user_name from orders inner join user on user.user_id=customer_id";

$result = mysqli_query($conn, $sql);

