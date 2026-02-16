const DB_KEY = "dictation_db_v3";

function loadDB() {
    const raw = localStorage.getItem(DB_KEY);
    if (!raw) {
        return {
            teacherPassword: "1234",
            instruction: "",
            students: [],
            results: []
        };
    }
    return JSON.parse(raw);
}

function saveDB(db) {
    localStorage.setItem(DB_KEY, JSON.stringify(db));
}

export function getStudents() {
    return loadDB().students;
}

export function addStudent(name, text) {
    const db = loadDB();
    db.students.push({
        id: Date.now(),
        name,
        text
    });
    saveDB(db);
}

export function deleteStudent(id) {
    const db = loadDB();
    db.students = db.students.filter(s => s.id !== id);
    saveDB(db);
}

export function getInstruction() {
    return loadDB().instruction;
}

export function setInstruction(text) {
    const db = loadDB();
    db.instruction = text;
    saveDB(db);
}

export function saveResult(studentName, correct, total) {
    const db = loadDB();
    db.results.push({
        id: Date.now(),
        studentName,
        correct,
        total,
        date: new Date().toLocaleString()
    });
    saveDB(db);
}

export function getResults() {
    return loadDB().results;
}

export function checkTeacherPassword(pass) {
    return pass === loadDB().teacherPassword;
}

export function setTeacherPassword(pass) {
    const db = loadDB();
    db.teacherPassword = pass;
    saveDB(db);
}
