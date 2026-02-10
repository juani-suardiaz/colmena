<?php

    function edad ($fecha_nacimiento) {

        if (date("m", $fecha_nacimiento) < date("m")) {

            return date("Y") - date("Y", $fecha_nacimiento);

        } else {

            if (date("m", $fecha_nacimiento) > date("m")) {

                return date("Y") - date("Y", $fecha_nacimiento) - 1;

            } else {

                if (date("d", $fecha_nacimiento) <= date("d")) {

                    return date("Y") - date("Y", $fecha_nacimiento);

                } else {

                    return date("Y") - date("Y", $fecha_nacimiento) - 1;

                }

            }

        }

    }

/* EN VBA

Function edad(fecha_nacimiento As Date) As Integer

    If DatePart("m", fecha_nacimiento) < DatePart("m", Date) Then
    
        edad = DateDiff("yyyy", fecha_nacimiento, Date)
    
    Else
    
        If DatePart("m", fecha_nacimiento) > DatePart("m", Date) Then
        
            edad = DateDiff("yyyy", fecha_nacimiento, Date) - 1
        
        Else
        
            If DatePart("d", fecha_nacimiento) <= DatePart("d", Date) Then
            
                edad = DateDiff("yyyy", fecha_nacimiento, Date)
            
            Else
            
                edad = DateDiff("yyyy", fecha_nacimiento, Date) - 1
            
            End If
        
        End If
    
    End If

End Function

*/

?>