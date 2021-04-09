$(function(){
    const stripe = Stripe("pk_test_51IMWbiGO4FFeK4h2FWTs9CBuJ8ENWeV70VtVe94hPFk8JBw5inq6mnhMudYm8VtAggxswOlS1VKud8GNoGa3YWMY00uUEfs63g");
    const checkoutButton = $('#checkout-button');
    checkoutButton.on('click', function(e){
        e.preventDefault();
        console.log($('#quantite').val());
        $.ajax({
            url:'index.php?action=pay',
            method:'post',
            data:{
                id: $('#ref').val(),
                name_p: $('#name_p').val(),
                prix: $('#prix').val(),
                email: $('#email').val(),
                quantite: $('#quant').val(),
                nb: $('#quantite').val()
            },
            datatype: 'json',
            success:function(session){
                console.log(session);
                return stripe.redirectToCheckout({ sessionId: session.id });
            },
            error: function(){
                console.error("fail to send!");
            }
        });
    })
});