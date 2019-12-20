describe('Соответствие значений', () => {
    it('Проверка а на значение 10', () => {
        let a = 10; // То, что проверяем
        expect(a).toBe(10);

        a = 9;
        expect(a).toBe(9)
    })
});
describe('Дополнительные функции', () => {
    it('Сравнение объектов', () => {
        let myGo = () => {};

        let user1 ={
            name: 'Ann',
            age: 20,
            go: myGo

        };
        let user2 ={
            name: 'Ann',
            age: 20,
            go: myGo
        };

        // expect().toBeNull();
        // expect().not.toBeNull();
        // expect().toBeUndefined();
        // expect().toBeTruthy();
        // expect().toBeFalsy();
        // expect().toBeNaN();
        // expect().toBeGreaterThan();
        // expect().toBeGreaterThanOrEqual();
        // expect().toBeLessThanOrEqual();
        // expect().toBeLessThan();
        // expect().toBeCloseTo();

        expect(user1).toEqual(user2);
    });
    it('regexp', () => {
        let str = 'Test AbcD jasmine';

        expect(str).toMatch(/abcd/i);
        expect(str).not.toMatch(/abcd/);
    });
    it('Arrays', () => {
        let arr = ['black', 'white'];

        expect(arr).toContain('white');
        expect(arr).not.toContain('red');
    });
    // it('Проверка а на значение 10', async () => {
    //     await fetch()
    //
    //     let a = 10; // То, что проверяем
    //     expect(a).toBe(10);
    //
    //     a = 9;
    //     expect(a).toBe(9)
    // })
});