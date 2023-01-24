

                     <form action="{{route('slots.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                           <div class="form-group">
                                 
                                    <button type="button" class="addslotPhase">Add</button>
                                    <table class="ticketPhaseList">
                                        <tr>
                                            <th>Name</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td> <input type="text" name="slot_name[0]" class="slot_name"  > </td>
                                            <td> <input type="text" name="slot1[0]" class="slot_c1"  > </td>
                                            <td> <input type="text" name="slot2[0]" class="slot_c2"  > </td>
                                           
                                            <td> <button class="deleteslots"  type="button" >Delete</button> </td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="submit">Submit</button>
</form>
                        <Script>
                           $('.addTslots').click(function() {
        $('.slotsList').append(
        `<tr>
            <td> <input type="text" name="slot_name[0]" class="slot_name" placeholder="Name" > </td>
            <td> <input type="text" name="slot_name[0]" class="slot_name"  > </td>
            <td> <input type="text" name="slot_name[0]" class="slot_name"  > </td>
          
            <td> <button class="deleteslots"  type="button" >Delete</button> </td>
        </tr>`
        )
        resetTicketPhaseIndexes();
    });

    $('.slotsList').delegate('.deleteslots', 'click', function() {
        if ($('.slotList').find('tr').length > 2) 
            $(this).closest('tr').remove();
        resetTicketPhaseIndexes();
    });

    function resetTicketPhaseIndexes() {
        $('.slotList').find('tr').each(function(index, element) {
            $(element).find('.slot_name').attr('name', `slot_name[${index}]`);
            $(element).find('.slot_c1').attr('name', `slot_c1[${index}]`);
            $(element).find('.slot_c2').attr('name', `slot_c2[${index}]`);
           
        });
    }

                            </script>

