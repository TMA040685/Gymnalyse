<?php
                                                        $cyr = date('Y');
                                                        $mgy = $cyr - 3;
                                                        $ngy = $cyr - 2;
                                                        $prep_stmt = "SELECT DISTINCT year,SUBSTRING(year,3,2) FROM GSL_Class WHERE skole = '".$skole."'";
                                                        $result = $mysqli->query($prep_stmt);
                                                        if ( $result->num_rows >= 1) {
                                                                while ($row=$result->fetch_assoc()) {
                                                                        $aar = $cyr-$row["year"]+1;
                                                                        if ($school == "MG") {
                                                                                if ($aar <= "4") {
                                                                                        echo '<label class="btn btn-default"><input type="radio" name="year" value="'.$row["SUBSTRING(year,3,2)"].'"/>'.$row["year"].'</label>';
                                                                                }
                                                                        } else {
                                                                                if ($aar <= "3") {
                                                                                        echo '<label class="btn btn-default"><input type="radio" name="year" value="'.$row["SUBSTRING(year,3,2)"].'"/>'.$row["year"].'</label>';
                                                                                }
                                                                	}
                                                        	}
							}
                                                ?>
