// validator2.js
//   An example of input validation using the change and submit 
//   events, using the DOM 2 event model
//   Note: This document does not work with IE8

// ********************************************************** //
// The event handler function for the name text box

function chkName(event) {

    // Get the target node of the event
    
      var myName = event.currentTarget;
    
    // Test the format of the input name 
    //  Allow the spaces after the commas to be optional
    //  Allow the period after the initial to be optional
    
      var pos = myName.value.search(/^[a-zA-z ?]+$/);

      // if all letters are alphabet characters and character spaces, pos is 0
      // if one letter is non alphabet character or character space, pos is -1

      if (pos != 0) {
        alert("The name you entered (" + myName.value + 
              ") is not in the correct form. \n" +
              "Only key in alphabet characters and character spaces");
        myName.focus();
        myName.select();
        return false;
      }
    }
    
    // ********************************************************** //
    // The event handler function for the email text box
    
    function chkEmail(event) {
    
    // Get the target node of the event
    
      var myEmail = event.currentTarget;
    
    // Test the format of the input email address
      var emailPos = myEmail.value.search(/^[\w.-]+@([\w]+\.){1,3}[\w]{2,3}$/);

      if (emailPos != 0) {
        alert("The email number you entered (" + myEmail.value +
              ") is not in the correct form." );
        myEmail.focus();
        myEmail.select();
        return false;
      } 
    }

    // ********************************************************** //
    // The event handler function for the date inputs
    
    function chkDate(event) {
    
        // Get the target node of the event
        
          var myDate = event.currentTarget;
          var selectedDate = new Date(myDate.value)
          var currentDate = new Date();

          if (selectedDate <= currentDate) {
            alert("Please choose a start date after today!");
            myDate.focus();
            myDate.select();
            return false;
          } 
        }

        
        function chkEndDate(event) {
          var startDate = document.getElementById("startDateID").value;
          dateNode.addEventListener("change", chkDate, false);

          var endDate = event.currentTarget.value;
          
      
          if ((Date.parse(endDate) <= Date.parse(startDate))) {
              alert("Return date should be later than Borrow date!");
              document.getElementById("enddateID").value = "";
          }
        }
    

        function chkCard(event) {

          // Get the target node of the event
          
            var myCard = event.currentTarget;
          
          // Test the format of the input name 
          //  Allow the spaces after the commas to be optional
          //  Allow the period after the initial to be optional
          
            var cardpos = myCard.value.search(/^\d{16}$/);
      
            // if all letters are alphabet characters and character spaces, pos is 0
            // if one letter is non alphabet character or character space, pos is -1
      
            if (cardpos != 0) {
              alert("The name you entered (" + myCard.value + 
                    ") is not in the correct form. \n" +
                    "Only key in 16 numbers");
              myCard.focus();
              myCard.select();
              return false;
            }
          }

          function chkNumber(event) {

            // Get the target node of the event
            
              var myNumber = event.currentTarget;
            
            // Test the format of the input name 
            //  Allow the spaces after the commas to be optional
            //  Allow the period after the initial to be optional
            
              var numberpos = myNumber.value.search(/^\d{8}$/);
        
              // if all letters are alphabet characters and character spaces, pos is 0
              // if one letter is non alphabet character or character space, pos is -1
        
              if (numberpos != 0) {
                alert("The name you entered (" + myNumber.value + 
                      ") is not in the correct form. \n" +
                      "Only key in 8 numbers");
                myNumber.focus();
                myNumber.select();
                return false;
              }
            }

            function chkComment(event) {

              // Get the target node of the event
              
                var myComment = event.currentTarget;
              
              // Test the format of the input name 
              //  Allow the spaces after the commas to be optional
              //  Allow the period after the initial to be optional
              
                var numberpos = myComment.value.search(/^$/);
          
                // if all letters are alphabet characters and character spaces, pos is 0
                // if one letter is non alphabet character or character space, pos is -1
          
                if (numberpos == 0) {
                  alert("The name you entered (" + myComment.value + 
                        ") is not in the correct form. \n" +
                        "Please input something to help us!");
                  myComment.focus();
                  myComment.select();
                  return false;
                }
              }
    
              function chkCVV(event) {

                // Get the target node of the event
                
                  var myCVV = event.currentTarget;
                
                // Test the format of the input name 
                //  Allow the spaces after the commas to be optional
                //  Allow the period after the initial to be optional
                
                  var numberpos = myCVV.value.search(/^\d{3}$/);
            
                  // if all letters are alphabet characters and character spaces, pos is 0
                  // if one letter is non alphabet character or character space, pos is -1
            
                  if (numberpos != 0) {
                    alert("The name you entered (" + myCVV.value + 
                          ") is not in the correct form. \n" +
                          "Only key in 3 numbers");
                    myCVV.focus();
                    myCVV.select();
                    return false;
                  }
                }

                function chkOrder(event) {

                  // Get the target node of the event
                  
                    var myOrder = event.currentTarget;
                  
                  // Test the format of the input name 
                  //  Allow the spaces after the commas to be optional
                  //  Allow the period after the initial to be optional
                  
                    var numberpos = myOrder.value.search(/^[0-9]{1,3}$/);
              
                    // if all letters are alphabet characters and character spaces, pos is 0
                    // if one letter is non alphabet character or character space, pos is -1
              
                    if (numberpos != 0) {
                      alert("The name you entered (" + myOrder.value + 
                            ") is not in the correct form. \n" +
                            "Only key in 1 to 3 numbers");
                      myOrder.focus();
                      myOrder.select();
                      return false;
                    }
                  }

                
          function chkNumber2(event) {

            // Get the target node of the event
            
              var myNumber2 = event.currentTarget;
            
            // Test the format of the input name 
            //  Allow the spaces after the commas to be optional
            //  Allow the period after the initial to be optional
            
              var numberpos = myNumber2.value.search(/^\d{8}$/);
        
              // if all letters are alphabet characters and character spaces, pos is 0
              // if one letter is non alphabet character or character space, pos is -1
        
              if (numberpos != 0) {
                alert("The name you entered (" + myNumber2.value + 
                      ") is not in the correct form. \n" +
                      "Only key in 8 numbers");
                myNumber2.focus();
                myNumber2.select();
                return false;
              }
            }