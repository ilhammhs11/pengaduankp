<?php
function DeleteKelas($id)
{
	$conn = mysqli_connect('localhost', 'root', '', 'dbpengaduan');
	$query = "SELECT * FROM siswa WHERE id_kelas = '$id'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)) {

		$query2 = "SELECT * FROM pengaduan WHERE id_user = '".$row['id_user']."'";
		$result2 = mysqli_query($conn, $query2);
		while ($row2 = mysqli_fetch_assoc($result2)) {
			$query3 = "DELETE FROM tanggapan WHERE id_pengaduan = '".$row2['id_pengaduan']."'";
			mysqli_query($conn, $query3);

			$query4 = "DELETE FROM pengaduan WHERE id_pengaduan = '".$row2['id_pengaduan']."'";
			mysqli_query($conn, $query4);
		}

		$query5 = "DELETE FROM users WHERE id_user = '".$row['id_user']."'";
		mysqli_query($conn, $query5);
	}
}
?>