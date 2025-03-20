<script text="text/JavaScript">
        function confirmation(event){
            event.preventDefault();

            var urlToRedirect=event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);


            swal({
                title: "Are You Sure to Delete This",
                text: "This delete will be parmanent",
                icon: "warning",
                buttons: true,
                dengerMode: true
            })

            .then((willCancel)=>{

            if(willCancel)
            {
                window.location.href=urlToRedirect;
            }

            });
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
