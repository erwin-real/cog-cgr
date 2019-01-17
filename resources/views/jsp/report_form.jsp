<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
            <div class="content-holder mt-5 mb-5">

                <form action="save_report" method="POST" novalidate>

                    <div class="text-sm-center">
                        <h2>Report</h2>
                        <c:if test="${message != null}">
                            <span class="text-danger">${message}</span>
                        </c:if>
                        <hr>
                    </div>

                    <label class="text-info mt-2">Type of report</label>

                    <div class="ml-4 mb-3">
                        <div class="form-check mb-0">
                            <input type="radio" class="form-check-input" name="type" value="Sunday" on onclick="toggleC2S();" required> Sunday Attendance
                        </div>
                        <div class="form-check mb-0">
                            <input type="radio" class="form-check-input" name="type" value="Care Group" onclick="toggleC2S();" required> Care group Attendance
                        </div>
                        <div class="form-check mb-0">
                            <input type="radio" id="c2s" class="form-check-input" name="type" value="C2S" onclick="toggleC2S();" required> C2S Attendance
                        </div>
                    </div>

                    <div class="form-group for-c2s">
                        <label class="text-info" for="c2sLeader">C2S Leader</label>
                        <select class="form-control" name="c2sLeader" id="c2sLeader" required>
                            <option disabled selected value="">None</option>
                            <c:forEach var="c2sLeader" items="${c2sLeaders}">
                                <option>${c2sLeader.name}</option>
                            </c:forEach>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="clusterArea">Cluster Area</label>
                        <select class="form-control" name="clusterArea" id="clusterArea" required>
                            <option disabled selected value="">None</option>
                            <c:forEach var="area" items="${areas}">
                                <option>${area}</option>
                            </c:forEach>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="date">Date</label>
                        <input type="date" name="dateCG" class="form-control" value="${date}" id="date" required>
                    </div>

                    <div class="form-group">
                        <label class="text-info">Time</label>
                        <input type="time" name="timeCG" value="${time}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-info" for="topic">Topic</label>
                        <input type="text" name="topic" class="form-control" value="${report.topic}" id="topic" placeholder="---" required>
                    </div>

                    <div class="form-group not-c2s">
                        <label class="text-info" for="offering">Offering</label>
                        <input type="number" name="offering" class="form-control" value="${report.offering}" id="offering" placeholder="---" required>
                    </div>

                    <div class="form-group for-c2s">
                        <label class="text-info">Attendance</label>
                        <div class="row">
                            <div class="col-md-6">
                                <ul id="c2s_present" class="pl-2">
                                    <li>
                                        <label class="text-info col-4 pl-0">Present</label>
                                        <button class="btn btn-success mb-2" type="button"
                                                onclick="addMember('','c2sPresentName','c2s_present');">Add Name
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 mt-4 mt-md-0">
                                <ul id="c2s_absent" class="pl-2">
                                    <li>
                                        <label class="text-info col-4 pl-0">Absent</label>
                                        <button class="btn btn-success mb-2" type="button"
                                                onclick="addMember('','c2sAbsentName','c2s_absent');">Add Name
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="form-group not-c2s">

                        <label class="text-info mb-0">Attendance
                            <p class="text-muted mb-0">(PRESENT ONLY)</p>
                        </label>

                        <div class="row">
                            <c:forEach var="cluster" items="${clusters}">
                                <div class="col-sm-12 col-md-6">
                                    <p class="pl-2 text-info">${cluster} Area</p>
                                    <ul>
                                        <c:forEach var="member" items="${members}">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="attendance" value="${member.id}"> ${member.name}
                                                        <c:if test="${!member.active}"> <span class="text-danger">*</span></c:if>
                                                    </label>
                                                </div>
                                            </li>
                                        </c:forEach>
                                    </ul>
                                </div>
                            </c:forEach>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="text-info" for="consolidation-report">Consolidation Report</label>
                        <textarea id="consolidation-report" name="consolidationReport" class="form-control">${report.consolidationReport}</textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary m-auto">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script src="../../static/js/vendor.min.js"></script>

<script>
    var c2s = document.getElementById("c2s"),
        forC2S = document.getElementsByClassName("for-c2s"),
        notC2S = document.getElementsByClassName("not-c2s");

    var toggleC2S = function () {
        forC2S[0].style.display = (c2s.checked) ? "block" : "none";
        forC2S[1].style.display = (c2s.checked) ? "block" : "none";
        notC2S[0].style.display = (c2s.checked) ? "none" : "block";
        notC2S[1].style.display = (c2s.checked) ? "none" : "block";
    };

    var addMember = function (param, name, id) {
        var li = document.createElement("li");
        li.className = "row mb-2";
        li.innerHTML =
            "<label class='text-info col-4 mb-0 pt-1 mr-2'>Name: </label>" +
            "<input type='text' name='" + name +
            "' class='form-control col-7' placeholder='---' required value='" + param + "'>";
        document.getElementById(id).appendChild(li);
    };

    <c:if test="${report != null}">
        var type = document.getElementsByName("type"),
            members = document.getElementsByName("attendance");
        document.getElementById("c2sLeader").value = "${report.c2sLeader}";
        document.getElementById("clusterArea").value = "${report.clusterArea}";

        if ("${report.type}" === "Sunday") type[0].checked = true;
        else if ("${report.type}" === "Care Group") type[1].checked = true;
        else type[2].checked = true;
        
        <c:if test="${report.type != 'C2S'}">
            var present = "${report.present}".split(",");
            for (var i = 0; i < present.length; i++){
                for (var j = 0; j < members.length; j++) {
                    if (present[i] === members[j].value) members[j].checked = true;
                }
            }
        </c:if>

        <c:if test="${report.type == 'C2S'}">
            var presentC2S = "${report.present}".split(","),
                absentC2S = "${report.absent}".split(",");
            for (var x = 0; x < presentC2S.length; x++) addMember(presentC2S[x], 'c2sPresentName', 'c2s_present');
            for (var y = 0; y < absentC2S.length; y++) addMember(absentC2S[y], 'c2sAbsentName', 'c2s_absent');
        </c:if>
    </c:if>
</script>