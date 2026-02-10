<?php

    function cuil ($dni, $sexo) {

        if (is_numeric($dni) == false) {

            return "No es un número";

        } else {

            if ($dni < 1000000 || $dni > 99999999) {

                return "Número fuera de rango";

            } else {

                $dni_texto = strval($dni);

                $largo_dni = strlen($dni_texto);

                // Se rellena el dni con 0 hasta completar los ocho dígitos

                for ($i = $largo_dni + 1; $i <= 8; $i++) {

                    $dni_texto = "0" . $dni_texto;

                }

                // Se configura el prefijo dependiendo de si se trata de una mujer o de un hombre

                if ($sexo) {

                    // hombre

                    $prefijo = "20";

                } else {

                    // mujer

                    $prefijo = "27";

                }

                // Se une el prefijo al DNI

                $dni_texto_2 = $prefijo . "-" . $dni_texto;
                
                $dni_texto = $prefijo . $dni_texto;
                
                $sumatoria = 0;
                
                $multiplicador = 2;

                For ($i = 10; $i >= 1; $i--) {

                    if ($multiplicador > 7) {

                        $multiplicador = 2;

                    }

                    $sumatoria = $sumatoria + (intval(substr($dni_texto, -1)) * $multiplicador);

                    if ($i <> 1) {

                        $dni_texto = substr($dni_texto, 0, strlen($dni_texto) -1);

                        $multiplicador = $multiplicador + 1;

                    }

                }

                // dividir por 11
                
                $resto = $sumatoria % 11;
                
                if ($resto == 0) {
                
                    return $dni_texto_2 . "-0";
                
                } else {
                
                    if ($resto == 1) {
                    
                        if ($sexo) {
                        
                            // hombre
                            
                            return "23-" . substr($dni_texto_2, 4, strlen($dni_texto_2) - 3) . "-9";
                        
                        } else {
                        
                            // mujer
                            
                            return "23-" . substr($dni_texto_2, 4, strlen($dni_texto_2) - 3) . "-4";
                        
                        }
                    
                    } else {
                    
                        return $dni_texto_2 . "-" . strval(11 - $resto);
                    
                    }
                        
                }

            }

        }

    }

/* EN VBA

Function cuil(dni As Variant, sexo As Boolean) As String

    Dim dni_texto As String
    Dim dni_texto_2 As String
    Dim prefijo As String
    Dim largo_dni As Byte
    Dim i As Integer
    Dim sumatoria As Long
    Dim resto As Byte
    Dim multiplicador As Byte
    
    If (IsNumeric(dni) = False) Then
    
        cuil = "No es un número"
    
    Else
    
        If (dni < 1000000) Or (dni > 99999999) Then
        
            cuil = "Número fuera de rango"
        
        Else

            dni_texto = CStr(dni)
            
            largo_dni = Len(dni_texto)
            
            ' Se rellena el dni con 0 hasta completar los ocho dígitos
            
            For i = (largo_dni + 1) To 8
            
                dni_texto = "0" & dni_texto
            
            Next i
            
            ' Se configura el prefijo dependiendo de si se trata de una mujer o de un hombre
            
            If sexo Then
            
                ' hombre
            
                prefijo = "20"
            
            Else
            
                ' mujer
                
                prefijo = "27"
            
            End If
            
            ' Se une el prefijo al DNI
            
            dni_texto_2 = prefijo & "-" & dni_texto
            
            dni_texto = prefijo & dni_texto
            
            sumatoria = 0
            
            multiplicador = 2
            
            For i = 10 To 1 Step -1
            
                If multiplicador > 7 Then
        
                    multiplicador = 2
                
                End If
            
                sumatoria = sumatoria + (CInt(Right(dni_texto, 1)) * multiplicador)
                
                If i <> 1 Then
                
                    dni_texto = Mid(dni_texto, 1, Len(dni_texto) - 1)
                    
                    multiplicador = multiplicador + 1
                    
                End If
            
            Next i
            
            ' dividir por 11
            
            resto = sumatoria Mod 11
            
            If resto = 0 Then
            
                cuil = dni_texto_2 & "-0"
            
            Else
            
                If resto = 1 Then
                
                    If sexo Then
                    
                        ' hombre
                        
                        cuil = "23-" & Mid(dni_texto_2, 4, Len(dni_texto_2) - 3) & "-9"
                    
                    Else
                    
                        ' mujer
                        
                        cuil = "23-" & Mid(dni_texto_2, 4, Len(dni_texto_2) - 3) & "-4"
                    
                    End If
                
                Else
                
                    cuil = dni_texto_2 & "-" & CStr(11 - resto)
                
                End If
                    
            End If
        
        End If
    
    End If

End Function

*/

?>