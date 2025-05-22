# Unit Tests (TaskTesk.php)
1. test_can_create_task:
   Menguji basic creatoin Task model
   Memverifikasi bahwa tugas dibuat dengan atribut yang benar
   Memastikan model memiliki tipe yang benar
2. test_task_has_timestamps:
   Memverivikasi bahwa timestamps diatur secara otomoatis saat creating task
   Memeriksa fields created_at dan updated_at
3. test_can_delete_task:
   Menguji functionality task deletion
   Memverifikasi bahwa task telah dihapus dari database

# Features Tests (TodoListTest.php):
1. test_dashboard_loads_correctly:
   Menguji apakah dasbor page loads dengan benar
   Memverifikasi tampilan yang benar dimuat
   Memeriksa apakah data yang diperlukan diteruskan ke tampilan
2. test_can_create_task:
   Menguji creation task melalui request HTTP POST
   Memverifikasi task disimpan dalam basis data
   Memriksa renponse status
3. test_can_delete_task:
   Menguji deletion task melalui request HTTP DELETE
   Memverifikasi task telah dihapus dari basis data
   Memeriksa reponse status
4. test_dashboard_displays_tasks:
   Menguji apakah tasks yang dibuat muncul di dasbor
   Membuat multiple tasks dan memeriksa keberadaannya
   Memeriksa actual content rendering
5. test_empty_task_name_validation:
   Menguji validation untuk empty task submissions
   Memverifikasi empty tasks tidak simpan
   Memeriksa redirect yang tepat pada validation failure
6. test_delete_nonexistent_task:
   Menguji error handling untuk manghapus tasks yang tidak ada
   Memverifikasi response 404 yang tepat
