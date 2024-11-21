<?php
function login($username, $password, $conn) {
    //prepare statement untuk mencegah SQL Injection
    $stm = $conn->prepare("SELECT id, role FROM users WHERE username = ? AND password = ?");
    $stm->bind_param("ss", $username, $password);
    $stm->execute();
    $result = $stm->get_result();

    //Memastikan data yang diambil ada/tidak ada
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return ['user_id' => $user['id'], 'role' => $user['role']];
    }

    //tidak ada data yang diambil
    return ['status' => 'error'];
}

?>