<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-12 col-lg-8">
            <div class="content-holder mt-5 mb-5">
                <h3 class="text-center">
                    <c:if test="${member != null}">
                        <%
                            session.setAttribute("updateAccountID", ((Account) request.getAttribute("member")).getId());
                        %>
                        Update
                    </c:if>
                    <c:if test="${member == null}">
                        Add
                    </c:if>
                    Member
                </h3>
                <hr>

                <form action="save_member" method="POST">

                    <div class="form-group">
                        <label class="text-info" for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="${member.name}" placeholder="---" required>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="address">Address</label>
                        <input id="address" class="form-control" type="text" name="address" value="${member.address}" placeholder="---" required>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="clusterArea">Cluster Area</label>
                        <select class="form-control" id="clusterArea" name="clusterArea" required>
                            <option disabled selected value="">None</option>
                            <c:forEach var="area" items="${areas}">
                                <option>${area}</option>
                            </c:forEach>
                        </select>
                    </div>

                    <label class="text-info">Regular</label>
                    <div class="ml-4">
                        <div class="form-check mb-0">
                            <input type="radio" class="form-check-input" name="active" value="true" required> Yes
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="active" value="false" required> No
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label class="text-info" for="birthday">Birthday</label>
                        <input id="birthday" class="form-control" type="date" name="birthday" value="${bday}" required>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="contact_number">Contact Number</label>
                        <input id="contact_number" class="form-control" type="number" name="contactNumber" value="${member.contactNumber}" placeholder="---" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label class="text-info">Gender</label>
                            <div class="ml-4">
                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" name="gender" value="Male" required> Male
                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" value="Female" required> Female
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4 mb-3">

                            <label class="text-info">Group Age</label>

                            <div class="ml-4">
                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" name="groupAge" value="Men" required> Men
                                </div>

                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" name="groupAge" value="Women" required> Women
                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="groupAge" value="Youth" required> Youth
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4 mb-3">

                            <label class="text-info">Journey</label>
                            <div class="ml-4">
                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" id="pre_believer" name="journey" value="Pre-believer" onclick="toggleCLDP();" required> Pre-believer
                                </div>

                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" id="believer" name="journey" value="Believer" onclick="toggleCLDP();" required> Believer
                                </div>

                                <div class="form-check mb-0">
                                    <input type="radio" class="form-check-input" id="disciple" name="journey" value="Disciple" onclick="toggleCLDP();" required> Disciple
                                </div>

                                <div class="ml-3 cldp">

                                    <div class="form-check mb-0">
                                        <input type="radio" id="cldp1" class="form-check-input" name="cldp" value="1" onclick="toggle();"> CLDP 1
                                    </div>

                                    <div class="form-check mb-0">
                                        <input type="radio" id="cldp2" class="form-check-input" name="cldp" value="2" onclick="toggle();"> CLDP 2
                                    </div>

                                    <div class="form-check mb-0">
                                        <input type="radio" id="cldp3" class="form-check-input" name="cldp" value="3" onclick="toggle();"> CLDP 3
                                    </div>

                                </div>

                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="leader" name="journey" value="Leader" onclick="toggleCLDP();" required> Leader
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4 mb-0">
                        <button type="submit" class="btn btn-primary mx-auto" name="button">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="../../static/js/vendor.min.js"></script>

<script>
    var disciple = document.getElementById('disciple'),
        cldp1 = document.getElementById("cldp1"),
        cldp2 = document.getElementById("cldp2"),
        cldp3 = document.getElementById("cldp3");

    var toggleCLDP = function() {
        if (!disciple.checked) {
            cldp1.checked = false;
            cldp2.checked = false;
            cldp3.checked = false;
        } else {
            cldp1.checked = true;
        }
    };

    var toggle = function() {
        if (cldp1.checked || cldp2.checked || cldp3.checked) {
            ["pre_believer", "believer", "disciple", "leader"].forEach(function(id) {
                document.getElementById(id).checked = false;
            });
            disciple.checked = true;
        }
    };
    
    <c:if test="${member != null}">
        var gender = document.getElementsByName("gender");
        var groupAge = document.getElementsByName("groupAge");
        var journey = document.getElementsByName("journey");
        var cldp = document.getElementsByName("cldp");
        var active = document.getElementsByName("active");
        var values = ["${member.gender}", "${member.groupAge}", "${member.journey}", "${member.cldp}", "${member.active}"];

        if (values[0] === "Male") gender[0].checked = true;
        else gender[1].checked = true;

        if (values[1] === "Men") groupAge[0].checked = true;
        else if (values[1] === "Women") groupAge[1].checked = true;
        else groupAge[2].checked = true;

        if (values[2] === "Pre-believer") journey[0].checked = true;
        else if (values[2] === "Believer") journey[1].checked = true;
        else if (values[2] === "Disciple") {
            journey[2].checked = true;
            if (values[3] === '1') cldp[0].checked = true;
            else if (values[3] === '2') cldp[1].checked = true;
            else cldp[2].checked = true;
        }
        else journey[3].checked = true;

        if (values[4] === 'true') active[0].checked = true;
        else active[1].checked = true;


        document.getElementById("clusterArea").value = "${member.clusterArea}";
    </c:if>
</script>