
<script type="text/javascript">
    
    var triggerDashboardHide = function(){

        $('#order').addClass('active');
        $('#order').click();
    };
</script>
<div id="welcome">
    <table>
        <tr>
            <td id="welcomeNote" class="center-align">
                <?php

                $getArray = $this->request->query;

                if (isset($this->request->query['ordersuccess'])){
                    if($this->request->query['ordersuccess'] == '1838E13BE467C3EE099455E09FE9580B'){
                        echo $this->Html->image('Business/business_desk.png');

                        echo "<br><br><br><i style='font-size:6em' class='fa fa-shopping-bag' aria-hidden='true'></i>
                            <h2 style='font-size: 28px; font-weight: 300; color: #404040;'>Your order has been successfully created. <br>Check your <em>My Orders</em> tab to track your delivery status.</h2>";
                    }
                    elseif ($this->request->query['ordersuccess'] == 'D5841301015C65A9E3E43FE79DF712FA'){
                        echo $this->Html->image('Business/business_desk.png');

                        echo "<br><br><br><i style='font-size:6em; color:#ff4444;' class='fa fa-exclamation' aria-hidden='true'></i>
                            <h3 style='font-size: 28px; font-weight: 300; color: #404040;'>Your payment for the recent order is not successful <br>for some reason. Please try again.</h3>";
                    }
                    else{

                        echo $this->Html->image('Business/business_desk.png');

                        echo "<br><br><br><i style='font-size:6em; color:#ff4444;' class='fa fa-ban' aria-hidden='true'></i>
                            <h3 style='font-size: 28px; font-weight: 300; color: #404040;'>It seems you have lost your way!</h3>";
                    }
                    
                }
                
                elseif (sizeof($getArray) != 0){

                    echo $this->Html->image('Business/business_desk.png');

                    echo "<br><br><br><i style='font-size:6em; color:#ff4444;' class='fa fa-ban' aria-hidden='true'></i>
                        <h3 style='font-size: 28px; font-weight: 300; color: #404040;'>It seems you have lost your way!</h3>";
                }
                ?>        
            </td>
    	</tr>
    </table>      
</div>






